const ctx = document.getElementById('chart_one');
const ctx2 = document.getElementById('chart_two');
const ctx3 = document.getElementById('chart_three');

  new Chart(ctx, {

    type: 'bar',
    data: {
      labels: ['Location1', 'Location2', 'Location3'],
      datasets: [{
        label: 'Daily',
        data: [12, 19, 3],
        borderWidth: 1,
        borderColor: '#36A2EB',
        backgroundColor: '#9BD0F5',
      },{
        label: 'Monthly',
        data: [200, 300, 400],
        borderColor: '#FF6384',
        backgroundColor: '#FFB1C1',
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


  new Chart(ctx2, {

    type: 'pie',
    data: {
      labels: ['Traffic Lights', 'Slow Traffic'],
      datasets: [{
        label: 'Traffic',
        data: [300, 50],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)'
        ],
        hoverOffset: 4
      }]
    }
  });


  new Chart(ctx3, {

    type: 'bar',
    data: {
      labels: ['Location1', 'Location2', 'Location3'],
      datasets: [{
        label: 'Daily',
        data: [12, 19, 3],
        borderWidth: 1,
        borderColor: '#36A2EB',
        backgroundColor: '#9BD0F5',
      },{
        label: 'Monthly',
        data: [200, 300, 400],
        borderColor: '#FF6384',
        backgroundColor: '#FFB1C1',
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