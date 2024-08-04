<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Resources\RecipeResource;

use App\Models\Recipe;

class RecipeController extends Controller
{
    use AuthorizesRequests;
    public function index(){
        $recipes = Recipe::orderBy('id','DESC')
            ->with('category','tags','user')
            ->paginate();
        return RecipeResource::collection($recipes);
    }
}
