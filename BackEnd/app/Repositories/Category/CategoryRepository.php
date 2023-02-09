<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface{

    function getModel()
    {
        return Category::class;
    }
    public function all($request)
    {
        $categories = $this->model->select('*');

        if (!empty($request->search)) {
            $search = $request->search;
            $categories = $categories->Search($search);
        }
        return $categories->orderBy('id','DESC')->paginate(5);
    }
    public function update($id, $data){

        $category = $this->model->find($id);
        $category->name = $data['name'];
        $category->save();
        return $category;
    }
    public function delete($id){
        $category = $this->model->find($id);
        try {
            $category->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $category;
    }
    public function getTrashed($request){
        $query = $this->model->onlyTrashed();
        if (!empty($request->search)) {
            $search = $request->search;
            $query = $query->Search($search);
        }

        return $query->orderBy('id', 'DESC')->paginate(5);
    }
    public function restore($id){
        $category = $this->model->withTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }
    public function force_destroy($id){
        $category = $this->model->onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return $category;
    }


}
