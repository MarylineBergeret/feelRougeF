document.addEventListener('DOMContentLoaded', function() {
  let filterTypeSelect = document.getElementById('filter-type');
  let filterValueInput = document.getElementById('filter-value');

  if (filterTypeSelect) {
    filterTypeSelect.addEventListener('change', function() {
      let selectedValue = filterTypeSelect.value;

      if (selectedValue === 'cardFestival') {
        filterValueInput.setAttribute('placeholder', 'Enter the festival...');
      } else if (selectedValue === 'pseudo') {
        filterValueInput.setAttribute('placeholder', 'Enter the username...');
      } else if (selectedValue === 'date') {
        filterValueInput.setAttribute('placeholder', 'Enter the date (2023 or 2023-06 or 2023-06-17)');
      }
    });
  }
});

