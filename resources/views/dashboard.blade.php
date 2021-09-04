<x-layout>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">Gender</div>
                <div class="card-body">
                    <div id="pieChart" class="chart-height"></div>
                </div>
            </div>
        </div>
        <div class="ccol-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">Ages</div>
                <div class="card-body">
                    <canvas id="userChart" class="rounded shadow"></canvas>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script>
            var ctx = document.getElementById('userChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels:  {!!json_encode($chart->labels)!!} ,
                    datasets: [
                        {
                            label: 'Count of ages',
                            backgroundColor: {!! json_encode($chart->colours) !!} ,
                            data:  {!! json_encode($chart->dataset)!!} ,
                        },
                    ]
                },
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {if (value % 1 === 0) {return value;}}
                            },
                            scaleLabel: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#122C4B',
                            fontFamily: "'Muli', sans-serif",
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,
                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 10
                        }
                    }
                }
            });
        </script>
        <script>
            var chart9 = c3.generate({
                bindto: '#pieChart',
                data: {
                    // iris data from R
                    columns: [
                        @foreach($gender as $key => $val)
                        ['{!! ucwords($key) !!}', {!! $val !!}],
                        @endforeach
                    ],
                    type : 'pie',
                    colors: {
                        Male: '#007ae1',
                        Female: '#e5e8f2',
                    },
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                }
            });
        </script>
    </x-slot>
</x-layout>
