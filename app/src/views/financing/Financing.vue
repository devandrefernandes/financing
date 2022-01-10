<template>
  <v-card
    class="mt-4 px-8 py-4"
    min-height="600"
    width="800"
    max-width="800"
    transition="scale-transition"
  >
    <v-card-text>
      <v-row>
        <v-col cols="12" class="mb-4 d-flex justify-center">
          <v-img
            alt="Logo"
            class="mr-2"
            src="@/assets/financing.png"
            max-width="300"
          />
        </v-col>
      </v-row>
      <v-row class="mt-8">
        <v-col cols="12" sm="6">
          <v-select
            v-model="selectedCar"
            :items="cars"
            item-text="name"
            return-object
            label="Selecione um Veículo"
            @change="initialSimulate"
          />
        </v-col>
        <v-col cols="12" sm="3">
          <v-text-field
            v-model.lazy="initialValue"
            v-money="money"
            label="Valor de Entrada"
            @focus="initialSimulate"
          />
        </v-col>
        <v-col cols="12" sm="3" class="mt-3">
          <v-btn
            color="success"
            block
            @click="simulate"
          >
            Simular
          </v-btn>
        </v-col>
      </v-row>
      <v-row v-if="message">
        <v-col cols="12">
          <v-alert :type="message.type">
            {{ message.text }}
          </v-alert>
        </v-col>
      </v-row>
      <InstallmentResults
        v-else-if="simulated"
        :installment-results="installments"
        :selected-car="selectedCar"
      />
    </v-card-text>
  </v-card>
</template>

<script>

import CarRepository from '@/api/car-repository';
import { toMoney } from '@/util/helpers';
import InstallmentResults from './components/InstallmentResults.vue';

export default {
  name: 'Financing',
  components: {
    InstallmentResults,
  },
  data: () => ({
    cars: [],
    selectedCar: null,
    installments: [],
    installmentsQtd: [48, 12, 6],
    initialValue: 0,
    message: null,
    simulated: false,
    money: {
      decimal: ',',
      thousands: '.',
      prefix: 'R$ ',
      precision: 2,
      masked: false
    }
  }),
  created() {
    this.initialSimulate();
    this.fetchCars();
  },
  computed: {
    initialValueDouble() {
      const valueDouble = this.initialValue
        .replace(/[^0-9,-]+/g, '')
        .replace(',', '.');

      return parseFloat(valueDouble);
    },
  },
  methods: {
    async fetchCars() {
      try {
        const { data } = await CarRepository.list();
        this.cars = data?.results;
      } catch (ex) {
        this.setMessage({
          type: 'error',
          text: 'Houve um erro ao carregar a lista de carros.',
        });
      }
    },
    setMessage({ type, text }) {
      this.message = {
        type,
        text,
      };
    },
    changeCar() {
      this.installments = [];
      const price = parseFloat(this.selectedCar.price);
      const value = this.initialValueDouble;
      this.installmentsQtd.forEach((qtd) => {
        const installmentValue = ((price - value) / qtd);
        this.installments.push({
          qtd,
          value: installmentValue,
        });
      });
      this.simulated = true;
    },
    simulate() {
      this.message = null;
      const price = parseFloat(this.selectedCar?.price);
      const value = this.initialValueDouble;
      if (!this.selectedCar) {
        this.setMessage({
          type: 'error',
          text: 'O veículo deve ser selecionado.',
        });
      } else if (value >= price) {
        this.setMessage({
          type: 'error',
          text: `O valor de entrada deve ser menor do que o valor do veículo: ${toMoney(price)}`,
        });
      } else {
        this.changeCar();
      }
    },
    initialSimulate() {
      this.simulated = false;
      this.setMessage({
        type: 'info',
        text: 'Selecione um veículo, um valor de entrada e clique em SIMULAR!',
      });
    },
  },
}
</script>

<style scoped>
</style>
