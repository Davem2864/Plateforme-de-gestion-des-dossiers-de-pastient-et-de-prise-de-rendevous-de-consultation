// Définir les nouvelles polices par défaut et les couleurs pour imiter le style par défaut de Bootstrap
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

fetch("js/demo/pie-demo.php")
  .then((response) => response.json())
  .then((data) => {
    var ctx = document.getElementById("myPieChart").getContext("2d");
    var myBarChart = new Chart(ctx, {
      type: "bar", // Changer le type de graphique à 'bar'
      data: {
        labels: ["Docteur", "Patient", "Rendez-vous"],
        datasets: [
          {
            data: [data.doctorCount, data.patientCount, data.appointmentCount],
            backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
            hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false,
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              callback: function(value) {
                if (Number.isInteger(value)) {
                  return value;
                }
              },
            },
          }],
          xAxes: [{
            gridLines: {
              display: false,
            },
          }],
        },
      },
    });
  });
