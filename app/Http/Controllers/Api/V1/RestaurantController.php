<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreRestaurantRequest;
use App\Http\Requests\V1\UpdateRestaurantRequest;
use App\Http\Resources\V1\RestaurantCollection;
use App\Http\Resources\V1\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $includeDishes = $request->query('includeDishes');

        if ($includeDishes) {
            $restaurants = Restaurant::with('dishes')->paginate();
        } else {
            $restaurants = Restaurant::paginate();
        }

        return new RestaurantCollection($restaurants->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $user = \App\Models\User::find(1);

        $restaurant = $user->restaurants()->create($request->all());

        return new RestaurantResource($restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant, Request $request)
    {
        $includeDishes = $request->query('includeDishes');

        if ($includeDishes) {
            $restaurant = $restaurant->loadMissing('dishes');
        }

        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
