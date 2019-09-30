@extends('layouts.app')
<?php
$m = 0;
$v = 0;
$n = 0;
$period = "";
foreach ($reservations as $reservation) {
    $period = $reservation->period;
    if(strstr($period, 'Matutino')){
    $m += 1;
}
if(strstr($period, 'Vespertino')){
    $v += 1;
}
if(strstr($period, 'Noturno')){
    $n += 1;
}
    
}

$dataPoints = array(

    array("x"=> 10, "y"=> $m, "indexLabel"=> "Matutino"),
    array("x"=> 20, "y"=> $v, "indexLabel"=> "Vespertino"),
    array("x"=> 30, "y"=> $n, "indexLabel"=> "Noturno")
);
	
?>
<script>
        window.onload = function () {
         
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Períodos das Reservas"
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
         
        }
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
