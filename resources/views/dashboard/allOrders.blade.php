@extends('dashboard.layouts.main')

@section('container')
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-dark">Recent Orders</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-light">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-dark uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-dark uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-dark uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-dark uppercase tracking-wider">Total Price
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-dark uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($all_orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark">{{ $order->order_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->product_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->total_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $order->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                <p class="text-sm text-dark mb-2">
                    Showing {{ $all_orders->firstItem() ?? 0 }} to {{ $all_orders->lastItem() ?? 0 }} of
                    {{ $all_orders->total() }} orders
                </p>
                <div class="flex justify-end space-x-2">
                    @if ($all_orders->onFirstPage())
                        <span class="px-3 py-1 rounded bg-light text-dark cursor-default select-none">Previous</span>
                    @else
                        <a href="{{ $all_orders->previousPageUrl() }}"
                            class="px-3 py-1 rounded bg-primary text-white hover:bg-secondary transition">Previous</a>
                    @endif
                    @foreach ($all_orders->getUrlRange(max(1, $all_orders->currentPage() - 1), min($all_orders->lastPage(), $all_orders->currentPage() + 1)) as $page => $url)
                        @if ($page == $all_orders->currentPage())
                            <span
                                class="px-3 py-1 rounded bg-accent text-white font-semibold cursor-default">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 rounded text-primary hover:bg-light transition">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($all_orders->hasMorePages())
                        <a href="{{ $all_orders->nextPageUrl() }}"
                            class="px-3 py-1 rounded bg-primary text-white hover:bg-secondary transition">Next</a>
                    @else
                        <span class="px-3 py-1 rounded bg-light text-dark cursor-default select-none">Next</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
