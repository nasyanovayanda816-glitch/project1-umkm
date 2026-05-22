const ctx = document.getElementById('salesChart');

new Chart(ctx, {
  type: 'line',

  data: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul'],

    datasets: [{
      label:'Sales',

      data:[120,190,300,250,420,500,620],

      borderColor:'#3b82f6',

      backgroundColor:'rgba(59,130,246,0.15)',

      fill:true,

      tension:0.5,

      borderWidth:4,

      pointRadius:5,

      pointHoverRadius:8
    }]
  },

  options: {
    responsive:true,

    plugins:{
      legend:{
        display:false
      }
    },

    scales:{
      y:{
        beginAtZero:true,
        grid:{
          color:'rgba(0,0,0,0.05)'
        }
      },

      x:{
        grid:{
          display:false
        }
      }
    }
  }
});