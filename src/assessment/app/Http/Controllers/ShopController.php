<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShopController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return ShopResource::collection(Shop::with('area')->paginate(10));
    }


    public function store(StoreShopRequest $request): ShopResource
    {
        $createdShop = Shop::query()->create([
            'area_id' => $request->input('area_id'),
            'shop_name' => strtoupper($request->input('shop_name'))
        ]);
        return new ShopResource($createdShop);
    }


    public function show(Shop $shop): ShopResource
    {
        return new ShopResource($shop);
    }


    public function update(UpdateShopRequest $request, Shop $shop): ShopResource
    {
        $shop->update([
            'area_id' => $request->input('area_id'),
            'shop_name' => strtoupper($request->input('shop_name')),
        ]);

        return new ShopResource($shop);
    }


    public function destroy(Shop $shop)
    {
        $shop->delete();
        return response("Shop Successfully Removed", 200);
    }
}
