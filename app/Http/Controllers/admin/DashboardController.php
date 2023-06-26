<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Transaction = Transaction::count();
        $revenue = Transaction::sum('total_price');
        $customer = User::count();
        return view('pages.admin.dashboard',[
            'customer' => $customer,
            'transaction' => $Transaction,
            'revenue' => $revenue
        ]);
    }
}
