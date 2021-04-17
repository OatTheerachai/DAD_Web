$(function () {
  'use strict'

  $('#start_date1').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4',
  });
  $('#end_date1').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4',
  });
  $('#start_date2').datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
});
$('#end_date2').datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
});
  
    var color = ['#FF9999','#FFCC99','#FFFF99','#CCFF99','#99FF99','#99FFCC','#99FFFF','#99CCFF','#9999FF','#CC99FF',];
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold',
      callback: function(value) {
        if (value.length > 15) {
          return value.substr(0, 15) + '...'; //truncate
        } else {
          return value
        }

      }
    }
  
    var mode = 'index'
    var intersect = true;

    var options = {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          // scaleLabel: {
          //   display: true,
          //   labelString: 'probability'
          // },
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a ฿ in the ticks
            callback: function (value, index, values) {
              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          // scaleLabel: {
          //   display: true,
          //   labelString: 'probability'
          // },
          ticks    : ticksStyle
        }]
      }
    }
    var $EventChart = $('#view-event-chart');
    var EventChart;
    $.ajax({  
      type: "GET",  
      url: "../../assets/lib/datareturn.php?i=12"
    }).done(function(resp) {
      // console.log(resp);
      
      EventChart  = new Chart($EventChart, {
        type   : 'bar',
        data   : {
          labels  : resp.name,
          datasets: [
            {
              backgroundColor: color,
              borderColor    : color,
              data           : resp.view
            }
          ]
        },
        options: options
      })
    });
    var $agencyChart = $('#view-agency-chart');
    var agencyChart;
    $.ajax({  
      type: "GET",  
      url: "../../assets/lib/datareturn.php?i=13"
    }).done(function(resp) {
      // console.log(resp);
      agencyChart  = new Chart($agencyChart, {
        type   : 'bar',
        data   : {
          labels  : resp.name,
          datasets: [
            {
              backgroundColor: color,
              borderColor    : color,
              data           : resp.view
            }
          ]
        },
        options: options
      })
      // console.log(agencyChart.update());
      // agencyChart.update();
    });

    function updateConfigAsNewObject(chart,resp) {
      chart.data = {
            labels  : resp.name,
            datasets: [
              {
                backgroundColor: color,
                borderColor    : color,
                data           : resp.view
              }
            ]
          };
      chart.update();
  }

    $("#start_date1,#end_date1").on("change", function(e) {
      var start_date_1 = $('#start_date1').val();
      var end_date_1 = $('#end_date1').val();
      // EventChart.empty();
      // var start_date_2 = $('#start_date2').val();
      // var end_date_2 = $('#end_date2').val();
      $.ajax({  
        type: "GET",  
        url: "../../assets/lib/datareturn.php",
        data: {
          i:16,
          start_date: start_date_1,
          end_date: end_date_1
        }
      }).done(function(resp) {
        updateConfigAsNewObject(EventChart,resp);
      });
    })

    $("#start_date2,#end_date2").on("change", function(e) {
      var start_date_2 = $('#start_date2').val();
      var end_date_2 = $('#end_date2').val();
      // var start_date_2 = $('#start_date2').val();
      // var end_date_2 = $('#end_date2').val();
      $.ajax({  
        type: "GET",  
        url: "../../assets/lib/datareturn.php",
        data: {
          i:17,
          start_date: start_date_2,
          end_date: end_date_2
        }
      }).done(function(resp) {
        updateConfigAsNewObject(agencyChart,resp);
      });
    })
  })
  