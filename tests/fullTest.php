<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Category;
use App\Ingredient;
use App\Place;
use App\RatingsPlace;
use App\RatingsRecipe;
use App\Recipe;
use App\RecipeIngredient;
use App\Suggestion;
use App\Tag;
use App\Unit;
use App\User;


class fullTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Recipe::all() as $recipe) {
            $this->visit('/recipe/'.$recipe->id.'/list')
                 ->dontSee("Whoops, looks like something went wrong.");
        }
        $this->visit('/suggestion')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/credits')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/login')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/register')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/auth/login')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/auth/logout')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/auth/register')
             ->dontSee("Whoops, looks like something went wrong.");

        $this->visit('/panel')
             ->dontSee("Whoops, looks like something went wrong.");

        $this->visit('/panel/recipes')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/ingredients/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Recipe::all() as $recipe) {
          $this->visit('/panel/recipes/'.$recipe->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/recipes/'.$recipe->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");
        }

        $this->visit('/panel/ingredients')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/ingredients/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Ingredient::all() as $ingredient) {
          $this->visit('/panel/ingredients/'.$ingredient->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/ingredients/'.$ingredient->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");
        }

        $this->visit('/panel/tags')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/tags/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Tag::all() as $tag) {
          $this->visit('/panel/tags/'.$tag->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/tags/'.$tag->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");

        }

        $this->visit('/panel/units')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/units/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Unit::all() as $unit) {
          $this->visit('/panel/units/'.$unit->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/units/'.$unit->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");
        }

        $this->visit('/panel/suggestions')
               ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/suggestions/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Suggestion::all() as $suggestion) {
          $this->visit('/panel/suggestions/'.$suggestion->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/suggestions/'.$suggestion->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");
        }

        $this->visit('/panel/places')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/places/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Place::all() as $place) {
          $this->visit('/panel/places/'.$place->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/places/'.$place->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");
        }

        $this->visit('/panel/categories')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/categories/create')
             ->dontSee("Whoops, looks like something went wrong.");
        foreach (Category::all() as $category) {
          $this->visit('/panel/categories/'.$category->id)
               ->dontSee("Whoops, looks like something went wrong.");
          $this->visit('/panel/categories/'.$category->id.'/edit')
               ->dontSee("Whoops, looks like something went wrong.");

        }

        $this->visit('/panel/login')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/logout')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/privateaccess')
             ->dontSee("Whoops, looks like something went wrong.");
        $this->visit('/panel/prohibitedaction/asd')
             ->dontSee("Whoops, looks like something went wrong.");
    }
}