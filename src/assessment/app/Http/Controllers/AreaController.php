<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\JsonResponse;

class AreaController extends Controller
{
    /**
     * @OA\Get(
     *    path="/areas",
     *    operationId="index",
     *    tags={"Areas"},
     *    summary="Get list of areas",
     *    description="Get list of areas",
     *    @OA\Parameter(name="limit", in="query", description="limit", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="page", in="query", description="the page number", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="order", in="query", description="order  accepts 'asc' or 'desc'", required=false,
     *        @OA\Schema(type="string")
     *    ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return AreaResource::collection(Area::with('shops')->paginate(10));
    }


    /**
     * @OA\Post(
     *      path="/areas",
     *      operationId="store",
     *      tags={"Areas"},
     *      summary="Store Area in DB",
     *      description="Store Area in DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"area_name"},
     *            @OA\Property(property="area_name", type="string", format="string", example="Harare CBD")
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
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
