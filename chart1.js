
  const ctx = document.getElementById('animalchart1');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Cattle', 'Goats', 'Poultry'],
      datasets: [{
        label: 'Quantity',
        data: [12, 19, 40],
        borderWidth: 0
        
        
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

