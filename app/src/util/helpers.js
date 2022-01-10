export function toMoney(value) {
  const valueNumber = parseFloat(value);

  return valueNumber.toLocaleString('pt-BR', {
    style: 'currency',
    currency: 'BRL',
    currencyDisplay: 'symbol',
  });
}