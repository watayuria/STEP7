<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

public static function getIndexData()
    {
        $products = self::all();
        $companies = Company::all();
        return compact('products', 'companies');
    }

    public static function getSearchData($keyword, $company_name)
    {
        $query = self::query();
        $companies = Company::all();

        if (!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        if (!empty($company_name) && $company_name !== 'すべて') {
            $query->whereHas('company', function ($query) use ($company_name) {
                $query->where('company_name', $company_name);
            });
        }

        $products = $query->get();

        return compact('products', 'companies', 'keyword');
    }

    public static function getProductData($product)
    {
        return compact('product');
    }

    public static function getCreateData()
    {
        $companies = Company::all();
        return compact('companies');
    }

    public static function getEditData($product)
    {
        $companies = Company::all();
        return compact('product', 'companies');
    }

    public static function storeProduct($requestData)
    {
        $product = new self();
        $product->product_name = $requestData['product_name'];
        $company = Company::where('company_name', $requestData['company_name'])->first();
        if ($company) {
            $product->company_id = $company->id;
        }
        $product->price = $requestData['price'];
        $product->stock = $requestData['stock'];
        $product->comment = $requestData['comment'];
        $product->img_path = $requestData['img_path'];
        $product->save();

        return $product;
    }

    public function updateProduct($requestData)
    {
        $this->product_name = $requestData['product_name'];
        $company = Company::where('company_name', $requestData['company_name'])->first();
        if ($company) {
            $this->company_id = $company->id;
        }
        $this->price = $requestData['price'];
        $this->stock = $requestData['stock'];
        $this->comment = $requestData['comment'];
        $this->img_path = $requestData['img_path'];
        $this->save();

        return $this;
    }

    public function deleteProduct()
    {
        $this->delete();
    }
}
