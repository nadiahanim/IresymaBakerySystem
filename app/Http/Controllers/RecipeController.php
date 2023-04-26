<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Recipe;
use App\Models\RecipeImages;

class RecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::where([['status_data',1]])->get();

        return view('Recipe.index', 
        [
            'recipes' => $recipes
        ]);
    }

    public function create()
    {
        return view('Recipe.create', 
        [

        ]);
    }

    public function save(Request $request)
    {
        $title = $request->title;
        $body = $request->description;

        $recipe = new Recipe;

        $recipe->title          = $title;
        $recipe->body           = $body;
        $recipe->status_data    = 1;
        $recipe->updated_on     = date('Y-m-d H:i:s');

        $saved = $recipe->save();
        
        if($saved)
        {
            return redirect()->route('recipe.index')->with([
                'success' => 'New recipe successfully added!',
            ]);
        }
        else 
        {
            return redirect()->route('recipe.create')->with([
                'error' => 'New recipe addition unsuccessful',
            ]);
        }

    }

    public function view(Request $request)
    {
        $recipe_id = $request->recipe_id;

        $recipe = Recipe::where([['id',$recipe_id]])->first();

        return view('Recipe.view', 
        [
            'recipe' => $recipe,
        ]);
    }

    public function edit(Request $request)
    {
        $recipe_id = $request->recipe_id;

        $recipe = Recipe::where([['id',$recipe_id]])->first();

        return view('Recipe.edit', 
        [
            'recipe' => $recipe,
        ]);

    }

    public function update(Request $request)
    {
        $recipe_id = $request->recipe_id;
        $title = $request->title;
        $body = $request->description;

        $recipe = Recipe::where([['id',$recipe_id]])->first();

        $recipe->title          = $title;
        $recipe->body           = $body;
        $recipe->updated_on     = date('Y-m-d H:i:s');

        $saved = $recipe->save();

        if($saved)
        {
            return redirect()->route('recipe.view', ['recipe_id'=>$recipe_id])->with([
                'success' => 'Recipe update successful!',
            ]);
        }
        else 
        {
            return redirect()->route('recipe.view', ['recipe_id'=>$recipe_id])->with([
                'error' => 'Recipe update unsuccessful',
            ]);
        }


    }

    public function delete(Request $request)
    {
        $recipe_id = $request->recipe_id;

        $recipe = Recipe::where([['id',$recipe_id]])->first();

        $recipe->status_data   = 0;
        $recipe->updated_on    = date('Y-m-d H:i:s');

        $saved = $recipe->save();
        
        if($saved)
        {
            return redirect()->route('recipe.index')->with([
                'success' => 'Recipe delete successful!',
            ]);
        }
        else 
        {
            return redirect()->route('recipe.index')->with([
                'error' => 'Recipe delete unsuccessful',
            ]);
        }
    }

}
