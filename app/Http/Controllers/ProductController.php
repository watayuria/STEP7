<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{


    public function index()
{
    $data = Product::getIndexData();
    return view('index', $data);
}

public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $company_name = $request->input('company_name');
    $data = Product::getSearchData($keyword, $company_name);
    return view('index', $data);
}

public function show(Product $product)
{
    $data = Product::getProductData($product);
    return view('products.show', $data);
}

public function create()
{
    $data = Product::getCreateData();
    return view('products.create', $data);
}

public function edit(Product $product)
{
    $data = Product::getEditData($product);
    return view('products.edit', $data);
}

public function store(ProductRequest $request)
{
    $product = Product::storeProduct($request->all());

    return redirect()
        ->route('products.index');
}

public function update(ProductRequest $request, Product $product)
{
    $updatedProduct = $product->updateProduct($request->all());

    return redirect()
        ->route('products.show', $updatedProduct);
}

public function destroy(Product $product)
{
    $product->deleteProduct();

    return redirect()
        ->route('products.index');
}

}
