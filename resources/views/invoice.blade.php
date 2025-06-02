@extends('layouts.main')

@section('container')
    <div class="max-w-3xl mx-auto my-8 px-4 py-8 bg-white shadow-sm rounded-lg">
        <!-- RECEIPT Header -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-2xl font-bold text-dark">RECEIPT</h1>
                <p class="text-sm text-gray-600 mt-1">#RCP-2023001</p>
            </div>
            <div class="text-right">
                <div class="text-xl font-bold text-primary">BlueHorizon</div>
                <p class="text-sm text-gray-600">
                    Jl. Raya Rungkut Madya<br>
                    Surabaya, Indonesia<br>
                    info@bluehorizon.org<br>
                    +62 812 3456 7890
                </p>
            </div>
        </div>

        <!-- RECEIPT Info & Customer Info -->
        <div class="flex flex-col md:flex-row justify-between mb-8 gap-6">
            <!-- Customer Information -->
            <div class="w-full md:w-1/2">
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">PURCHASED By</h2>
                <div class="p-4 bg-light rounded-md">
                    <div class="font-medium text-dark">{{ $latestOrder->name }}</div>
                    <p class="text-sm text-gray-600">
                        {{ $latestOrder->company }}<br>
                        {{ $latestOrder->country }}<br>
                        {{ $latestOrder->email }}
                    </p>
                </div>
            </div>

            <!-- RECEIPT Details -->
            <div class="w-full md:w-1/2">
                <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">RECEIPT Details</h2>
                <div class="space-y-1">
                    <div class="flex justify-between border-b border-gray-100 py-2">
                        <span class="text-sm text-gray-600">RECEIPT Number:</span>
                        <span class="text-sm font-medium text-dark">INV-2023001</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-100 py-2">
                        <span class="text-sm text-gray-600">RECEIPT Date:</span>
                        <span class="text-sm font-medium text-dark">{{ $tanggalLengkap }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-sm text-gray-600">Payment Terms:</span>
                        <span class="text-sm font-medium text-dark">Net 14</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- RECEIPT Items -->
        <div class="mb-8">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">RECEIPT ITEMS</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-light">
                            <th class="py-3 px-4 text-left text-xs font-semibold text-dark uppercase tracking-wider">
                                Description</th>
                            <th class="py-3 px-4 text-center text-xs font-semibold text-dark uppercase tracking-wider">Qty
                            </th>
                            <th class="py-3 px-4 text-right text-xs font-semibold text-dark uppercase tracking-wider">Unit
                                Price</th>
                            <th class="py-3 px-4 text-right text-xs font-semibold text-dark uppercase tracking-wider">Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($orders as $order)
                            <tr>
                                <td class="py-3 px-4 text-sm text-gray-800">{{ $order->product_name }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800 text-center">{{ $order->quantity }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800 text-right">
                                    ${{ number_format($order->unit_price, 2) }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800 text-right">
                                    ${{ number_format($order->unit_price * $order->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- RECEIPT Summary -->
        <div class="flex justify-end mb-8">
            <div class="w-full md:w-1/3">
                <div class="space-y-1">
                    <div class="flex justify-between border-b border-gray-100 py-2">
                        <span class="text-sm text-gray-600">Subtotal:</span>
                        <span class="text-sm font-medium text-dark">${{ number_format($grandTotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-100 py-2">
                        <span class="text-sm text-gray-600">Tax (10%):</span>
                        <span class="text-sm font-medium text-dark">${{ $tax }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-base font-semibold text-dark">Total:</span>
                        <span class="text-base font-bold text-primary">{{ $totalFinal }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Print Button (correct position below the total) -->
        <div class="flex justify-end mb-8 no-print">
            <button id="printButton"
                class="px-6 py-2 bg-primary text-white text-sm font-semibold rounded-lg shadow-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Print PDF
            </button>
        </div>



        <!-- Notes (will be hidden in PDF) -->
        <div class="mb-8 no-print">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Notes</h2>
            <p class="text-sm text-gray-600 p-4 bg-gray-50 rounded-md">
                Thank you for your purchase! Your contribution goes beyond the transaction, helping protect our oceans and
                support marine life restoration. Together, we're making waves for a healthier sea.
            </p>
        </div>
    </div>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            const content = document.querySelector('.max-w-3xl');
            const noPrintElements = document.querySelectorAll('.no-print');

            // Hide elements that shouldn't appear in PDF
            noPrintElements.forEach(element => {
                element.style.display = 'none';
            });

            // Remove top margin/padding for PDF generation
            const originalStyle = content.style.cssText;
            content.style.marginTop = '0';
            content.style.paddingTop = '0';

            const options = {
                margin: [0.3, 0.5, 0.3, 0.5], // Reduced margins
                filename: 'invoice.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    dpi: 192,
                    letterRendering: true,
                    scale: 0.9, // Slightly increased scale
                    useCORS: true,
                    allowTaint: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A4',
                    orientation: 'portrait'
                }
            };

            // Generate PDF
            html2pdf().from(content).set(options).save().then(() => {
                // Restore original styles and show elements again
                content.style.cssText = originalStyle;
                noPrintElements.forEach(element => {
                    element.style.display = 'block';
                });
                 window.location.href = '/';
            });
        });
    </script>
@endsection
