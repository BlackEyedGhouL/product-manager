<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use domain\Facades\DashboardFacade;

class DashboardController extends ParentController
{
    public function index() {
        $response['products'] = DashboardFacade::all();
        return view('pages.dashboard.index')->with($response);
    }

    public function store(Request $request) {
        DashboardFacade::store($request);
        return redirect()->back();
    }

    public function delete($product_id) {
        DashboardFacade::delete($product_id);
        return redirect()->back();
    }

    public function status($product_id) {
        DashboardFacade::status($product_id);
        return redirect()->back();
    }

    public function edit(Request $request) {
        $response['product'] = DashboardFacade::get($request['product_id']);
        return view('pages.dashboard.edit')->with($response);
    }

    public function update(Request $request, $product_id) {
        DashboardFacade::update($request->all(), $product_id);
        return redirect()->back();
    }
}
