<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index(){
        $categories = Category::where('delete', false)->get();

        return response()->json([
            'message' => 'Get all category successfully',
            'categories' => $categories,
            'total'=>count($categories)
        ], 201);
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return new CategoryResource($category);
    }

    public function store(CategoryRequest $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        // Kiểm tra title tồn tại với delete = 0 hay không
        $existing = Category::where('title', $request->title)->where('delete', 0)->first();
        if ($existing) {
            return response()->json(['message' => 'Category with this title already exists.'], 400);
        }

        $category = Category::create(array_merge(
            $validator->validated(),
            ['slug' => Str::slug($request->title)]
        ));

        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }


        // Check exists
        $existing = Category::where('title', $request->title)
        ->where('delete', 0)
        ->where('id', '!=', $id)
        ->first();

        if ($existing) {
            return response()->json(['message' => 'Category with this title already exists.'], 400);
        }

        $category_id = Category::where('id', $id)->update(array_merge(
            $validator->validated(),
            ['slug' => Str::slug($request->title)]
        ));

        return response()->json([
            'message'=>'Updated successfully!',
            'category_id'=>$category_id
        ], 200);
    }

    public function destroy($id)
    {
        $affectedRows = Category::where('id', $id)->update(['delete'=>1]);

        if ($affectedRows > 0) {
            return response()->json([
                'message' => 'Delete successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Category not found or already deleted!',
            ], 404);
        }
    }
}
