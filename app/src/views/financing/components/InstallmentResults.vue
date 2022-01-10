<template>
  <v-row align="center">
    <v-col cols="12" sm="4" align="center">
      <div>
        <v-img
          :alt="selectedCar.name"
          class="mr-2"
          :src="selectedCar.image_url"
          width="100"
        />
      </div>
      <div class="my-2">
        {{ selectedCar.name }}
      </div>
      <div>
        {{ selectedCar.price | toMoney }}
      </div>
    </v-col>
    <v-col cols="12" sm="8">
      <v-simple-table>
        <thead>
          <tr>
            <th class="text-left">
              Parcelas
            </th>
            <th class="text-left">
              Valor da parcela
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(item, i) in InstallmentResults"
            :key="i"
          >
            <td>{{ item.qtd }}</td>
            <td>{{ item.value | toMoney }}</td>
          </tr>
        </tbody>
      </v-simple-table>
    </v-col>
  </v-row>
</template>

<script>

import { toMoney } from '@/util/helpers';

export default {
  name: 'InstallmentResults',
  filters: {
    toMoney(value) {
      return toMoney(value);
    },
  },
  props: {
    InstallmentResults: {
      type: Array,
      required: true,
    },
    selectedCar: {
      type: Object,
      required: true,
    },
  },
}

</script>