<div class = "row">
<!--<script type="text/javascript">
	$(function () {
    $('#container2').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Hostel Distribution'
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
            name: 'Hostel share',
            data: <?php echo $pie_details; ?>
        }]
    });
});
</script> -->
<div class = "col-md-5">
    <h2><?php echo $hostel_name; ?> Hostel</h2>
    <h3>Capacity: <?php echo ($hostelshare[0]['Occupied']) + ($hostelshare[0]['Not Occupied']); ?></h3>
    <p>Occupied: <?php echo $hostelshare[0]['Occupied']; ?></p>
    <p>Not Ooccupied: <?php echo $hostelshare[0]['Not Occupied']; ?></p>
</div>

<div class = "col-md-7">
    <table class = "table table-bordered table-hover">
        <thead>
            <th>#</th>
            <th>Room Name</th>
            <th>Capacity</th>
            <th>Occupied</th>
        </thead>
        <tbody>
            <?php echo $room_allocation; ?>
        </tbody>
    </table>
</div>
</div>