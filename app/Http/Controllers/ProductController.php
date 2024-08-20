<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $filters = [
            'name' => request()->get('product_name'),
            'price' => request()->get('price'),
        ];
        $products = $this->productRepository->getSearchProducts($filters);
        return view('product.index', ['product' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Product inserted successfully');
    }

    public function edit($id): View
    {
        $id = decrypt($id);
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $id = decrypt($id);
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
