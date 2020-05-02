<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Category;
use App\Http\Resources\Category as CategoryResource; 


class CategoryController extends Controller
{
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function index()
  {
    return CategoryResource::collection(Category::paginate());
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function store(Request $request)
  {
    try {

      $request->validate([
        "code" => "required",
        "description" => "required",
      ]);

      $category = Category::create($request->all());

      return response()->json(["message" => "Successfully Create Category"], 200);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function show()
  {
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function update(Request $request,$id)
  {
    try {

      $request->validate([
        "code" => "required",
        "description" => "required",
        "state" => "required",
      ]);
     
      $category = Category::findOrFail($id);
      $category ->update($request->all());

      return response()->json(["message" => "Successfully Update Category"], 200);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function destroy($id)
  {
    try {

      $category = Category::findOrFail($id);
      $category->delete();

      return response()->json(["message" => "Successfully Delete Category"], 200);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }

  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function search(Request $request)
  {
    try {
      $queryVal = $request->searchquery;
      $category = Category::where('state','active')->where('code','like','%'.$queryVal.'%')->paginate();

      return CategoryResource::collection($category);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }
}
