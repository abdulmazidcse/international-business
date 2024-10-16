<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $products = $this->service->getAllProducts();
        $products = $this->service->addAdditionalFields($products);
        return view('pages.product.index', compact('products'));
        // return response()->json($products);
    }
    
    public function create(Request $request)
    { 
        return view('pages.product.create');
        // return response()->json($products);
    }

    public function show($id)    {
        $product = $this->service->getProductById($id);
        $product = $this->service->addAdditionalFields(collect([$product]))->first();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'sap_code' => 'required|string',
            'mrp' => 'required|numeric',
            'status' => 'required|numeric',
            // 'category_id' => 'required|exists:categories,id',
            // 'brand_id' => 'required|exists:brands,id',
            // 'color_id' => 'required|exists:colors,id',
            // 'size_id' => 'required|exists:sizes,id',
        ]); 
        // 'product_short_code' 
        // 'distributor', 
        // $data['depo'] = $request->get('mrp'); 
        // $data->depo = $request->get('mrp');

        if($this->service->createProduct($data)){
            return redirect()->route('products.index')->with('message', 'Successfully done!'); 
        } else {
            return redirect()->route('products.index')->with('error', 'Somthing worng!'); 
        }
        
    }

    public function edit($id){
        $product = $this->service->getProductById($id);
        return view('pages.product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string',
            'sap_code' => 'string',
            'mrp' => 'numeric',
            // 'category_id' => 'exists:categories,id',
            // 'brand_id' => 'exists:brands,id',
            // 'color_id' => 'exists:colors,id',
            // 'size_id' => 'exists:sizes,id',
        ]);

        return response()->json($this->service->updateProduct($id, $data));
    }

    public function destroy($id)
    {
        return response()->json($this->service->deleteProduct($id));
    }
}