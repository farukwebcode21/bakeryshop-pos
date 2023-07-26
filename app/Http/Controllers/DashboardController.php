<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    function DashboardPage() {
        return view('pages.dashboard.dashboard-page');
    }

    public function TotalCustomer(Request $request) {
        $id = $request->header('id');
        return Customer::where('user_id', $id)->count();
    }

    public function TotalCategory(Request $request) {
        $id = $request->header('id');
        return Category::where('user_id', $id)->count();
    }
    public function TotalProduct(Request $request) {
        $id = $request->header('id');
        return Product::where('user_id', $id)->count();
    }
}
