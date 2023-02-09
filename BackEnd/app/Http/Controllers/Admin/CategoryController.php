<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\Category\CategoryServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);
        $categories = $this->categoryService->all($request);
        return view('admin.category.index',compact('categories'));
    }
    public function show($id){

    }

    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.category.add');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();
        try {
            $this->categoryService->create($data);
            Session::flash('success', config('define.store.succes'));
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:'. $e->getMessage());
            return redirect()->route('category.index');
        }
    }

    public function edit($id)
    {
        $item = $this->categoryService->find($id);
        $this->authorize('update', Category::class);
        return view('admin.category.edit',compact('item'));
    }

    public function update(UpdateCategoryRequest $request,$id)
    {
        $data = $request->all();
        try {
            Session::flash('success', config('define.update.succes'));
            $this->categoryService->update( $id, $data);
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.update.error'));
            return redirect()->route('category.index');
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete', Category::class);
        try {
            $category = $this->categoryService->delete($id);
            Session::flash('success', config('define.recycle.succes'));
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.recycle.error'));
            return redirect()->route('category.index');
        }
    }

    public function getTrashed(Request $request){
        $categories = $this->categoryService->getTrashed($request);
        return view('admin.category.recycle',compact('categories'));
    }

    public function restore($id){
        $this->authorize('restore',Category::class);
        try {
            $this->categoryService->restore($id);
            Session::flash('success', config('define.restore.succes'));
            return redirect()->route('category.getTrashed');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.restore.error'));
            return redirect()->route('category.getTrashed');
        }
    }

    public function force_destroy($id){
        $this->authorize('forceDelete', Category::class);
        try {
            $category = $this->categoryService->force_destroy( $id);
            Session::flash('success', config('define.delete.succes'));
            return redirect()->route('category.getTrashed');
        } catch (Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.delete.error'));
            return redirect()->route('category.getTrashed');
        }
    }
}
