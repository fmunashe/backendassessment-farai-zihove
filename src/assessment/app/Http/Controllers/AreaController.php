<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\JsonResponse;

class AreaController extends Controller
{

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return AreaResource::collection(Area::with('shops')->paginate(10));
    }


    public function store(StoreAreaRequest $request)
    {
        $createdArea = Area::query()->create([
            'area_name'=>$request->input('area_name')
        ]);

        return new AreaResource($createdArea);
    }


    public function show(Area $area): AreaResource
    {
        return new AreaResource($area);
    }


    public function update(UpdateAreaRequest $request, Area $area): AreaResource
    {
        $area->update($request->only(['area_name']));
        return new AreaResource($area);
    }


    public function destroy(Area $area)
    {
        $area->delete();
        return response("Area Successfully Removed", 200);
    }
}
