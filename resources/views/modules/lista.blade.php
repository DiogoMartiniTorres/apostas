@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista das Apostas
                        <a href="{{ route('apostas.create') }}" class="btn btn-success btn-sm float-end">
                            Nova Aposta
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- Adicione um elemento canvas para exibir o gráfico -->
                        <canvas id="myChart"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione o script do Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Crie o gráfico usando o Chart.js -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Vitórias', 'Derrotas'],
                datasets: [{
                    label: 'Total',
                    data: [{{ $totalVitorias }}, {{ $totalDerrotas }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
