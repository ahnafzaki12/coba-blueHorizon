@extends('dashboard.layouts.main')


@section('container')

    <body class="bg-gray-50">
        <div class="min-h-screen">
          
            <!-- Main Content -->
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                  @if (session()->has('success'))
                    <div
                        class="alert alert-success alert-dismissible fade show bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-3">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close text-green-800 hover:text-green-600" data-bs-dismiss="alert"
                            aria-label="Close">
                            &times;
                        </button>
                    </div>
                @endif
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Sales -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 bg-primary rounded-md">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Sales</p>
                                <p class="text-2xl font-bold text-dark">${{ number_format($total_sales, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Orders -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 bg-secondary rounded-md">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Orders</p>
                                <p class="text-2xl font-bold text-dark">{{ $total_order }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Products Sold -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 bg-accent rounded-md">
                                <i class="fas fa-box text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Products Sold</p>
                                <p class="text-2xl font-bold text-dark">{{ $product_sold }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Average Order -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <div class="flex items-center">
                            <div class="p-2 bg-light rounded-md">
                                <i class="fas fa-chart-line text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Avg. Order Value</p>
                                <p class="text-2xl font-bold text-dark">${{ $aov_formatted }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Daily Sales Chart -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <h2 class="text-lg font-semibold text-dark mb-4">Daily Sales</h2>
                        <div class="h-64">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>

                    <!-- Product Sales Chart -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <h2 class="text-lg font-semibold text-dark mb-4">Sales by Product</h2>
                        <div class="h-64">
                            <canvas id="productSalesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Top Products and Recent Orders -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Top Selling Products -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <h2 class="text-lg font-semibold text-dark mb-4">Top Selling Products</h2>
                        <div class="space-y-4">
                            @foreach ($top_selling_product as $index => $product)
                                <div
                                    class="flex items-center justify-between p-3 {{ $index === 0 ? 'bg-light' : 'bg-gray-50' }} rounded-md">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 {{ $index === 0 ? 'bg-primary' : ($index === 1 ? 'bg-secondary' : 'bg-accent') }} rounded-md flex items-center justify-center mr-3">
                                            <span class="text-white font-bold">{{ $index + 1 }}</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-dark">{{ $product->product_name }}</p>
                                            <p class="text-sm text-gray-600">{{ $product->total_sold }} units sold</p>
                                        </div>
                                    </div>
                                    <span
                                        class="font-bold {{ $index === 0 ? 'text-primary' : ($index === 1 ? 'text-secondary' : 'text-accent') }}">${{ number_format($product->total_revenue, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-dark">Recent Orders</h2>
                            <a href="/dashboard/orders" class="text-sm text-primary hover:underline">View All</a>
                        </div>
                        <div class="space-y-3">
                            @foreach ($recent_order as $order)
                                <div class="flex items-center justify-between p-3 border border-gray-100 rounded-md">
                                    <div>
                                        <p class="font-medium text-dark">{{ $order->product_name }}</p>
                                        <p class="text-sm text-gray-600">Order #{{ $order->order_id }} • Qty:
                                            {{ $order->quantity }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-primary">${{ number_format($order->total_price, 2) }}</p>
                                        <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <script>
            // Chart data from Laravel
            const chartData = @json($chart_data);

            // Daily Sales Chart
            const dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
            new Chart(dailySalesCtx, {
                type: 'line',
                data: {
                    labels: chartData.daily_sales.labels,
                    datasets: [{
                        label: 'Daily Sales',
                        data: chartData.daily_sales.data,
                        borderColor: '#0369a1',
                        backgroundColor: 'rgba(3, 105, 161, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            });

            // Product Sales Chart
            const productSalesCtx = document.getElementById('productSalesChart').getContext('2d');
            new Chart(productSalesCtx, {
                type: 'doughnut',
                data: {
                    labels: chartData.product_sales.labels,
                    datasets: [{
                        data: chartData.product_sales.data,
                        backgroundColor: [
                            '#0369a1',
                            '#0891b2',
                            '#06b6d4'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });
        </script>
    </body>
@endsection
