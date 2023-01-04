<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page != null ? $request->page : 1;
        $code = $request->code != null ? $request->code : "";
        $sort = $request->sort;
        $orders = Sales::getOrders($code);
        $total = count($orders);
        $orders = new LengthAwarePaginator(array_slice($orders, ($page - 1) * 15, 15), $total, 15, $page, array('path' => $request->url()));

        return view('user.orders', compact('orders', 'total', 'sort', 'code'));
    }
}
