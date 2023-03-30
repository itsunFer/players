<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::get();
        return view('orders.index', compact('orders')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Orders();
        $order->name = $request ->name;
        $order->team = $request ->team;
        $order->gender = $request -> gender;
        $order ->date = $request -> date;
        $order->save();

        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $order)
    {
        $request->validate([
            'name' => ['required'],
            'team' => ['required'],
            'gender' => ['required'],
            'date' => ['required']
        ]);

        $order->name = $request->name;
        $order->team = $request->team;
        $order->gender = $request->gender;
        $order->date = $request->date;
        $order->save();
        return redirect()->route('orders.show', $order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
