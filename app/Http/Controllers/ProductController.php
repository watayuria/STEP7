<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $companies = Company::all();
        return view('index', compact('products', 'companies'));
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $company_name = $request->input('company_name');
        $query = Product::query();
        $companies = Company::all();

        if (!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        if (!empty($company_name)) {
            if ($company_name !== 'すべて') {
                $query->whereHas('company', function ($query) use ($company_name) {
                    $query->where('company_name', $company_name);
                });
            }
        }

        $products = $query->get();

        return view('index', compact('products', 'companies', 'keyword'));
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function create() {
        $companies = Company::all();
        return view('products.create', compact('companies'));
    }

    public function store(ProductRequest $request) {
        $product = new Product();
        $product->product_name = $request->product_name;
        $company = Company::where('company_name', $request->company_name)->first();
        if ($company) {
            $product->company_id = $company->id;
        }
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->comment = $request->comment;
        $product->img_path = $request->img_path;
        $product->save();

        return redirect()
            ->route('products.index');
    }

    public function edit(Product $product) {
        $companies = Company::all();
        return view('products.edit', compact('product', 'companies'));
    }

    public function update(ProductRequest $request, Product $product) {
        $product->product_name = $request->product_name;
        $company = Company::where('company_name', $request->company_name)->first();
        if ($company) {
            $product->company_id = $company->id;
        }
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->comment = $request->comment;
        $product->img_path = $request->img_path;
        $product->save();

        return redirect()
            ->route('products.show', $product);
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect()
            ->route('products.index');
    }
}
