
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
});

// const ctz = document.getElementById('animalchart2');

// new Chart(ctz, {
//   type: 'bar',
//   data: {
//     labels: ['Cattle', 'Goats', 'Poultry'],
//     datasets: [{
//       label: 'Quantity',
//       data: [12, 19, 40],
//       backgroundColor: [
//         'rgb(255, 94, 0)',
//         'rgb(145, 255, 0)',
//         'rgb(0, 255, 255)'
//       ],
//       borderWidth: 0


//     }]
//   },
// });


const ctz = document.getElementById('animalchart2');

new Chart(ctz, {
  type: 'line',
  data: {
    labels: ['Healthy', 'Underweight', 'Overweight', 'Sick', 'Pregnant '],
    datasets: [{
      label: 'count',
      data: [6, 5, 8, 8, 5],
      fill: false,
      borderColor: 'rgb(0, 255, 255)',
      tension: 0.1
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


