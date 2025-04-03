@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-yellow-100 p-6 rounded-lg shadow">
            <h3 class="text-blue-500 text-sm">Terjadwal</h3>
            <p class="text-4xl font-bold">{{ $countWorkOrdersByPending }}</p>
        </div>

        <div class="bg-green-100 p-6 rounded-lg shadow">
            <h3 class="text-blue-500 text-sm">Selesai</h3>
            <p class="text-4xl font-bold">{{ $countWorkOrdersByCompleted }}</p>
        </div>

        <div class="bg-red-100 p-6 rounded-lg shadow">
            <h3 class="text-blue-500 text-sm">Dibatalkan</h3>
            <p class="text-4xl font-bold">{{ $countWorkOrdersByCanceled }}</p>
        </div>
        
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="col-span-2 bg-blue-100 p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Work Order Chart</h2>
            <div class="w-full">
                <canvas id="workOrderChart"></canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('workOrderChart');
                        const data = {
                            pending: {{ $countWorkOrdersByPending }},
                            completed: {{ $countWorkOrdersByCompleted }},
                            canceled: {{ $countWorkOrdersByCanceled }}
                        };

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Terjadwal', 'Selesai', 'Dibatalkan'],
                                datasets: [{
                                    label: 'Jumlah',
                                    data: [data.pending, data.completed, data.canceled],
                                    backgroundColor: [
                                        'rgba(253, 224, 71, 0.2)',  // yellow-100
                                        'rgba(187, 247, 208, 0.2)', // green-100
                                        'rgba(254, 202, 202, 0.2)'  // red-100
                                    ],
                                    borderColor: [
                                        'rgba(253, 224, 71, 1)',  // yellow-100
                                        'rgba(187, 247, 208, 1)', // green-100
                                        'rgba(254, 202, 202, 1)'  // red-100
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                        align: 'start',
                                        display: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection