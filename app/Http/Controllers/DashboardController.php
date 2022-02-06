<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Payment;
use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $totalUsers         =   User::count('id');
        $totalProducts      =   Product::count('id');
        $totalSales         =   SaleItem::sum('total');
        $totalPurchases     =   PurchaseItem::sum('total');
        $totalReceipts      =   Receipt::sum('amount');
        $totalPayments      =   Payment::sum('amount');
        $totalStock         =   PurchaseItem::sum('quantity') - SaleItem::sum('quantity');

        $user = Admin::all();
        return view('welcome', compact('user', 'totalUsers', 'totalProducts', 'totalSales', 'totalPurchases', 'totalReceipts', 'totalPayments', 'totalStock'));
    }
}
