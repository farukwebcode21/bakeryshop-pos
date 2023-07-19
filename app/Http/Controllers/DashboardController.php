<?php

namespace App\Http\Controllers;

class DashboardController extends Controller {
    function DashboardPage() {
        return view('pages.dashboard.dashboard-page');
    }
}
