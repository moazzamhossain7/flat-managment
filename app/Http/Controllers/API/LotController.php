<?php

namespace App\Http\Controllers\API;

use App\Models\Lot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Actions\Filters\LotFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\LotResource;

class LotController extends Controller
{
    /**
     * Return products list.
     * 
     * @return JSON
     */
    public function index(ProductFilter $filters) 
    {
        return ProductResource::collection(
            Product::filters($filters)->with('type', 'supplier', 'mainCategory')->paginate(20)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Product::rules());

        try {
            Product::isProductExists($request->only('subscriber_id', 'type_id', 'supplier_id', 'category_id', 'size'));

            $product = Product::create($this->persist($request));

            Product::generateProductCode($product);

            return (new ProductResource($product))->additional(['success' => true, 'message' => SUCCESS]);
        } catch(\Exception $e) {
            return respondError($e->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(Product::rules());

        try {
            Product::isProductExists($request->only('subscriber_id', 'type_id', 'supplier_id', 'category_id', 'size'), $id);

            $product = Product::findOrFail($id);
            
            $product->update($this->persist($request));

            Product::generateProductCode($product);

            return (new ProductResource($product))->additional(['success' => true, 'message' => UPDATE_SUCCESS]);
        } catch(\Exception $e) {
            return respondError($e->getMessage(), 400);
        }
    }

    /**
     * handle product store/update request input
     * 
     * @param Request $request
     * @return array
     */
    protected function persist(Request $request): array {
        return [
            'name' => $request->name, 
            'subscriber_id' => $request->subscriber_id,
            'product_code' => Str::random(60), 
            'type_id' => $request->type_id,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'size' => $request->size,
            'qty' => $request->qty,
            'description' => $request->description ?? $request->details
        ];
    }
}