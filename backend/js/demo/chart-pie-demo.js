// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
$.ajax({
  type: 'POST',
  url: 'getBestsubcategory.php',
  success:function(response)
  {
    var subcategoryResult = JSON.parse(response);
    var labelOne = subcategoryResult[0].subcategory;
    var labelTwo = subcategoryResult[1].subcategory;
    var labelThree = subcategoryResult[2].subcategory;

    var dataOne = subcategoryResult[0].count_itemscid;
    var dataTwo = subcategoryResult[1].count_itemscid;
    var dataThree = subcategoryResult[2].count_itemscid;

    $('.labelOne_data').html(labelOne);
    $('.labelTwo_data').html(labelTwo);
    $('.labelThree_data').html(labelThree);


var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [labelOne, labelTwo, labelThree],
    datasets: [{
      data: [dataOne, dataTwo, dataThree],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
  });

}
});
