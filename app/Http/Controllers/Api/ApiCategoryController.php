<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\inward;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiCategoryController extends Controller
{
    public function fetchCategorySearchData()
    {
        $category = inward::fetchCategorySearchData();
        return DataTables::of($category)->make(true);
    }
    public function getMaxCategoryId()
    {
        $id = Category::max('id') + 1;
        return response()->json(['id' => $id]);
    }
    public function saveCategory(Request $request)
    {
        $data = $request->all();
        if ($data['voucher_type'] == 'edit' && isset($data['id'])) {
            $category = Category::find($data['id']);
            if ($category) {
                $this->inputCategoryField($category, $data);
                $category->save();
                return response()->json(['success' => true, 'message' => 'Category updated successfully!']);
            } else {
                return response()->json(['error' => 'Category not found'], 404);
            }
        }
        $category = new Category();
        $this->inputCategoryField($category, $data);
        $category->save();
        return response()->json(['success' => true, 'message' => 'User saved successfully!']);
    }
    private function inputCategoryField($category, $data)
    {
        $category->category_name = $data['category_name'];
        $category->voucher_type = $data['voucher_type'];
        $category->status = $data['status'];
        $category->current_date = $data['current_date'];
        $category->category_description = $data['category_description'];
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['success' => true, 'message' => 'Category deleted successfully!']);
        }
        return response()->json(['error' => 'Category not found'], 404);
    }
    public function fetchCategory($id)
    {
        $category = Category::find($id);
        return response()->json(['success' => true, 'data' => $category]);
    }
}
