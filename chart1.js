
const ctx = document.getElementById('animalchart1');

new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Cattle', 'Goats', 'Poultry'],
    datasets: [{
      label: 'Quantity',
      data: [12, 19, 40],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
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

