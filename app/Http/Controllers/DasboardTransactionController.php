<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionsDetails;
use Illuminate\Support\Facades\Auth;

class DasboardTransactionController extends Controller
{
    public function index()
    {
        $sellTransactions = TransactionsDetails::with(['transaction.user','product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);
                            })->get();
        $buyTransactions = TransactionsDetails::with(['transaction.user','product.galleries'])
                            ->whereHas('transaction', function($transaction){
                                $transaction->where('users_id', Auth::user()->id);
                            })->get();
        
        return view('pages.dashboard-transactions',[
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionsDetails::with(['transaction.user','product.galleries'])
                            ->findOrFail($id);
        return view('pages.dashboard-transactions-details',[
            'transaction' => $transaction
        ]);
    }

    public function detailsbuy(Request $request, $id)
    {
        $transaction = TransactionsDetails::with(['transaction.user','product.galleries'])
                            ->findOrFail($id);
        return view('pages.dashboard-transactions-details-buy',[
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionsDetails::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-transaction-details', $id);
    }
}