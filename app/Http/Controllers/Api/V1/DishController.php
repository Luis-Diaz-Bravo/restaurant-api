<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\DishFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Requests\V1\BulkStoreDishRequest;
use App\Http\Resources\V1\DishCollection;
use App\Http\Resources\V1\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new DishFilter();
        $filterItems = $filter->transform($request);

        $dishes = Dish::where($filterItems)->paginate();

        return new DishCollection($dishes->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        //
    }

    /**
     * Store newly created resources in storage.
     */
    public function bulkStore(BulkStoreDishRequest $request)
    {
        Dish::insert($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return new DishResource($dish);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
