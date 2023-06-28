document.addEventListener('DOMContentLoaded', function() {
  let filterTypeSelect = document.getElementById('filter-type');
  let filterValueInput = document.getElementById('filter-value');

  if (filterTypeSelect) {
    filterTypeSelect.addEventListener('change', function() {
      let selectedValue = filterTypeSelect.value;

      if (selectedValue === 'cardFestival') {
        filterValueInput.setAttribute('placeholder', 'Entrer le festival...');
      } else if (selectedValue === 'pseudo') {
        filterValueInput.setAttribute('placeholder', 'Entrer le pseudo...');
      } else if (selectedValue === 'date') {
        filterValueInput.setAttribute('placeholder', 'Entrer une date (2023 ou 2023-06 ou 2023-06-17)');
      }
    });
  }
});

