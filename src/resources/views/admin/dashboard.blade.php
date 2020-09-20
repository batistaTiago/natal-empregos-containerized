@extends('layouts.admin_new')


@section('css')
<style>

	#chartdiv {
      position: absolute;
      top: 150px;
      left: 490px;
      width: 50%;
      height: 50%;
	}
	
	</style>
@endsection

@section('content')

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<h2 class="text-center p-5">Visitas no ultimo mês:</h1>
<div id="chartdiv"></div>


@endsection

@section('js')
<script>

    $(() => {
        // escrever todo o código js aqui dentro

        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartdiv", am4charts.XYChart);

        var data = {!! $acessosUltimos30Dias !!};

        chart.data = data;

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "dataAcesso";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;

        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
        if (target.dataItem && target.dataItem.index & 2 == 2) {
            return dy + 25;
        }
        return dy;
        });

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "qtd";
        series.dataFields.categoryX = "dataAcesso";
        series.name = "Acessos";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;

        }); // end am4core.ready()

    });

</script>
@endsection