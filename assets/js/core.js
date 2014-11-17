$(function () {
    base_url = getbaseurl();
    $('#search-criteria').select2();
    $('#example').dataTable();
    $('#search-criteria').change(function(){
        value = $('#search-criteria').val();
        $.ajax({
        url: base_url + "/sob/admin/filterstudent/" + value,
        })
        .done(function( data ) {
            console.log(data);
        })
        .fail(function(){
           alert("Error!");
        });
    });
    $('#container1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});

function getbaseurl()
{
    protocol = window.location.protocol;
    host = window.location.host;
    base_url = protocol + "//"+host;

    return base_url;
}