<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Order;
use App\Models\PerfumeOrder;
use App\Models\SlipperOrder;
use App\Models\WalletOrder;
use App\Models\WearableOrder;

class HomeController
{
    public function index()
    {
        $sales = Order::sum('price') + WalletOrder::sum('price') + WearableOrder::sum('price') + SlipperOrder::sum('price') + PerfumeOrder::sum('price') ;
        $today_sales = Order::where('created_at', '>=', today())->sum('price') + WalletOrder::where('created_at', '>=', today())->sum('price') + WearableOrder::where('created_at', '>=', today())->sum('price') + SlipperOrder::where('created_at', '>=', today())->sum('price') + PerfumeOrder::where('created_at', '>=', today())->sum('price') ;
        $new_clients = Customer::where('created_at', '>=', today())->count();
        return view('home', compact(['sales', 'today_sales', 'new_clients']));
    }
}
