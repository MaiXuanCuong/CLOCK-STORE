<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{

    function getModel()
    {
        return Brand::class;
    }

    public function all($request)
    {
        $brands = $this->model->select('*');

        if (!empty($request->search)) {
            $search = $request->search;
            $brands = $brands->Search($search);
        }
        return $brands->orderBy('id','DESC')->paginate(5);
    }
    public function create($data)
    {
        if ($data['inputFile']) {
            $file = $data['inputFile'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time(); // create file name by curent time
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $data['inputFile']->storeAs('public/images/brand', $newFileName); //save file in public/images/brand with newname is newFileName
            $data['image'] = $newFileName;
            return $this->model->create($data);
        }
    }
    public function update($id, $data)
    {
        $object = $this->model->find($id);
        if (!empty($data['inputFile'])) {
            $file = $data['inputFile'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time(); // create file name by curent time
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $data['inputFile']->storeAs('public/images/brand', $newFileName); //save file in public/images/brand with newname is newFileName
            $data['image'] = $newFileName;
        }else {
            $data['image'] = $object->image;
        }
        return $this->model->update($data);
    }
    public function getTrash($request)
    {
        $query = $this->model->onlyTrashed();
        if (!empty($request->search)) {
            $search = $request->search;
            $query = $query->Search($search);
        }

        return $query->orderBy('id', 'DESC')->paginate(5);
    }
    public function restore($id){
        return  $this->model->withTrashed()->where('id', $id)->restore();
    }
    public function forceDelete($id)
    {
        return  $this->model->withTrashed()->where('id', $id)->forceDelete();
    }

}
