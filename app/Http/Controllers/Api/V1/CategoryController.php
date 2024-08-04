<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return new CategoryCollection(Category::all());
    }

    public function show(Category $category){
        // with=se utiliza cuando se quiere cargar las relaciones junto con el modelo principal durante la consulta inicial.
        // load=se utiliza después de la consulta inicial cuando necesitas cargar relaciones en modelos ya recuperados.
        $category = $category->load('recipes.category','recipes.tags','recipes.user');
        return new CategoryResource($category);
    }
}
