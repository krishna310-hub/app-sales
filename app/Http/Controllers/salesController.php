<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\sales;
use Illuminate\Http\Request;

class salesController extends Controller
{
    public function sales()
    {
        $items = product::all();
        $products = Product::all();
        return view('sales', compact('items', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoiceNumber' => 'required',
            'invoiceDate' => 'required',
            'customerName' => 'required',
            'customerEmail' => 'required',
            'customerPhone' => 'required',
            'customerState' => 'required',
            'subTotal' => 'required',
            'quantity' => 'required',
            'gstPercentage' => 'required',
            'gstAmount' => 'required',
            'grandTotal' => 'required',
        ]);

        $sale = new sales();
        $sale->invoiceNumber = $request->input('invoiceNumber');
        $sale->invoiceDate = $request->input('invoiceDate');
        $sale->customerName = $request->input('customerName');
        $sale->customerEmail = $request->input('customerEmail');
        $sale->customerPhone = $request->input('customerPhone');
        $sale->customerState = $request->input('customerState');
        $sale->subTotal = $request->input('subTotal');
        $sale->quantity = $request->input('quantity');
        $sale->gstAmount = $request->input('gstAmount');
        $sale->gstPercentage = $request->input('gstPercentage');
        $grandTotal = str_replace('₹', '', $request->input('grandTotal'));
        $sale->grandTotal = floatval($grandTotal);

        $sale->save();

        return redirect()->back()->with('success', 'Sale saved successfully!');
    }

}

