@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <span>Dashboard</span>
            </h4>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col-md-9 mb-4">
            <div class="card">
                <div class="card-body">
                    <canvas id="Chart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card mb-4">
                <div class="card-body">

                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action waves-effect">Member
                        <span class="badge badge-primary badge-pill pull-right">{{$count_U}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Lapangan
                            <span class="badge badge-primary badge-pill pull-right">{{$count_L}}</span>
                        </a>
                    <a class="list-group-item list-group-item-action waves-effect">Booking
                    <span class="badge badge-primary badge-pill pull-right">{{$count_B}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Payment
                    <span class="badge badge-primary badge-pill pull-right">{{$count_P}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('js')
    <script>
		var ctx = document.getElementById("Chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pelanggan", "Data Booking", "Data Pembayaran", "Data Lapangan"],
				datasets: [{
					label: '',
					data: [ {{$count_U}}, {{$count_B}}, {{$count_P}}, {{$count_L}}
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
@endsection