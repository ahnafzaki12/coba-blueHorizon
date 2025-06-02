<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{
    use AuthorizesRequests; // Add this line
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        $total_sales = OrderItem::SUM(OrderItem::raw('quantity * unit_price'));
        $total_order = OrderItem::count();
        $product_sold = OrderItem::SUM('quantity');

        // Cegah division by zero
        if ($total_order > 0) {
            $aov = $total_sales / $total_order;
            $aov_formatted = number_format($aov, 2);
        } else {
            $aov_formatted = '0.00';
        }

        $top_selling_product = OrderItem::select('product_name', OrderItem::raw('SUM(quantity) AS total_sold'), OrderItem::raw('SUM(quantity * unit_price) AS total_revenue'))
            ->groupBy('product_name')
            ->orderByDesc('total_sold')
            ->limit(3)
            ->get();

        $recent_order = OrderItem::select('order_id', 'product_name', 'quantity', 'unit_price', 'created_at')
            ->addSelect(OrderItem::raw('unit_price * quantity as total_price'))
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $daily_sales = OrderItem::selectRaw('DATE(created_at) as date, SUM(quantity * unit_price) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $product_sales = OrderItem::select('product_name', OrderItem::raw('SUM(quantity * unit_price) as total'))
            ->groupBy('product_name')
            ->orderByDesc('total')
            ->get();

        $chart_data = [
            'daily_sales' => [
                'labels' => $daily_sales->pluck('date')->map(fn($date) => Carbon::parse($date)->format('M d')),
                'data' => $daily_sales->pluck('total')
            ],
            'product_sales' => [
                'labels' => $product_sales->pluck('product_name'),
                'data' => $product_sales->pluck('total')
            ]
        ];

        return view('dashboard.index', compact('total_sales', 'total_order', 'product_sold', 'aov_formatted', 'top_selling_product', 'recent_order', 'chart_data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function addAdmin()
    {
        return view('dashboard.addAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAdmin(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users',
                'is_admin' => 'required|boolean',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255'
            ]
        );
        
        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'is_admin' => 1, // Set to 1 to ensure the user is always an admin
        ]);

        return redirect('/dashboard')->with('success', 'Registration successfull!!');
    }


    /**
     * Display the specified resource.
     */
    public function orders()
    {
        $all_orders = OrderItem::select('order_id', 'product_name', 'quantity', 'unit_price', 'created_at')
            ->addSelect(OrderItem::raw('unit_price * quantity AS total_price'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.allOrders', compact('all_orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
