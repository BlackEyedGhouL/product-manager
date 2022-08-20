<?php

namespace domain\services;

use App\Models\Products;

class DashboardService {
    protected $product;

    public function __construct() {
        $this->product = new Products();
    }

    public function get($product_id) {
        return $this->product->find($product_id);
    }

    public function all() {
        return $this->product->all();
    }

    public function store($data) {
        $requestData = $data->all();
        $fileName = time().$data->file('image')->getClientOriginalName();
        $path = $data->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/'.$path;
        Products::create($requestData);
    }

    public function delete($product_id) {
        $product = $this->product->find($product_id);
        $product->delete();
    }

    public function status($product_id) {
        $product = $this->product->find($product_id);
        $product->status = "active";
        $product->update();
    }

    public function update(array $data, $product_id) {
        $product = $this->product->find($product_id);
        $product->update($this->edit($product, $data));
    }

    protected function edit(Products $product, $data) {
        return array_merge($product->toArray(), $data);
    }
}
