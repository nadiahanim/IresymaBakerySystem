// get colors array from the string
function getChartColorsArray(chartId) {
    if (document.getElementById(chartId) !== null) {
        var colors = document.getElementById(chartId).getAttribute("data-colors");
        
        if (colors) {
            colors = JSON.parse(colors);
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                    
                    if (color){
                      color = color.replace(" ", "");
                      return color;
                    }
                    else return newValue;;
                } else {
                    var val = value.split(',');
                    if (val.length == 2) {
                        var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                        return rgbaColor;
                    } else {
                        return newValue;
                    }
                }
            });
        }
    }
  }

// pie chart
var orders = $("#orders").data("piechart");
var label_orders = $("#label_orders").data("label");
var pieChartColors = getChartColorsArray("pie_chart_order");
if (pieChartColors) {
    var options = {
        chart: {
            height: 320,
            type: 'pie',
        },
        series: orders,
        labels: label_orders,
        colors: pieChartColors,
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]

    }

    var chart = new ApexCharts(
        document.querySelector("#pie_chart_order"),
        options
    );

    chart.render();
}

// Donut chart
var orders = $("#reviews").data("donutchart");
var label_orders = $("#label_reviews").data("label");
var donutChartColors = getChartColorsArray("donut_chart");
if (donutChartColors) {
    var options = {
        chart: {
            height: 320,
            type: 'donut',
        },
        series: orders,
        labels: label_orders,
        colors: donutChartColors,
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]

    }

    var chart = new ApexCharts(
        document.querySelector("#donut_chart"),
        options
    );

    chart.render();
}

//  line chart datalabel
var sales = $("#sales").data("linechart");
var lineChartDatalabelColors = getChartColorsArray("line_chart_datalabel");
if (lineChartDatalabelColors) {
    var options = {
        chart: {
            height: 380,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        colors: lineChartDatalabelColors,
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: [3, 3],
            curve: 'straight'
        },
        series: [{
            name: "Total Sales",
            data: sales
        },
        ],
        title: {
            text: 'Monthly Sales',
            align: 'left',
            style: {
                fontWeight: '500',
            },
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.2
            },
            borderColor: '#f1f1f1'
        },
        markers: {
            style: 'inverted',
            size: 6
        },
        xaxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            title: {
                text: 'Month'
            }
        },
        yaxis: {
            title: {
                text: 'Total Sales'
            },
            min: 0,
            max: 30
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: false
                    }
                },
                legend: {
                    show: false
                },
            }
        }]
    }
  
    var chart = new ApexCharts(
        document.querySelector("#line_chart_datalabel"),
        options
    );
  
    chart.render();
}