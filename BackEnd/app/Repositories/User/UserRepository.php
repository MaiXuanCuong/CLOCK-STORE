<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use App\Models\Province;
use App\Models\Group;
use App\Models\District;
use App\Models\Ward;

use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use StorageImageTrait;

    public function getModel()
    {
        return User::class;
    }

    public function all($request)
    {
        $users = $this->model->select('*');
        if (!empty($request->search)) {
            $search = $request->search;
            $users = $users->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->orWhere('group_id', 'like', '%' . $search . '%');

        }
        if (!empty($request->group_id)) {
            $users->NameGroup($request)
            ->Type($request);
        }
        if (!empty($request->province_id)) {
            $users->NameProv($request)
            ->Type($request);
        }

        $users->Type($request);

        return $users->orderBy('id', 'DESC')->paginate(3);
    }
    public function delete($id)
    {
        $user = $this->model->findOrFail($id);
        try {
            $user->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $user;
    }

    public function create($data)
    {
        // dd($data);
        try {
            DB::beginTransaction();
            $user = $this->model;
            $user->name = $data->name;
            $user->phone = $data->phone;
            $password = Str::random(6);
            $user->password = Hash::make($password);
            $user->birthday = $data->birthday;
            $user->email = $data->email;
            $user->gender = $data->gender;
            $user->address = $data->address;
            $user->province_id = $data->province_id;
            $user->group_id = $data->group_id;
            $user->ward_id = $data->ward_id;
            $user->district_id = $data->district_id;
            $user->image = $data->image;
            if ($data['inputFile']) {
                $file = $data['inputFile'];
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = time(); // create file name by curent time
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $data['inputFile']->storeAs('public/images/user', $newFileName); //save file in public/images/brand with newname is newFileName
                $data['image'] = $newFileName;
                $user->image = $data['image'];
            }
            $user->save();
                $params = [
                "password" => $password,
                'name' => $data->name,
            ];
            Mail::send('admin.emails.users', compact('params'), function ($email) use ($data) {
                $email->subject('TCC-Shop');
                $email->to($data->email, $data->name);
            });

            DB::commit();
            Session::flash('success', 'Thêm nhân viên' . ' ' . $data->name . ' ' . 'thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
        return $user;
    }


    public function update($request, $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->model->find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->birthday = $request->birthday;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->province_id = $request->province_id;
            $user->ward_id = $request->ward_id;
            $user->district_id = $request->district_id;
            $user->group_id = $request->group_id;
            if ($request['inputFile']) {
                $file = $request['inputFile'];
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = time(); // create file name by curent time
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $request['inputFile']->storeAs('public/images/user', $newFileName); //save file in public/images/brand with newname is newFileName
                $data['image'] = $newFileName;
                $user->image = $data['image'];
            }
            $user->save();
            DB::commit();
            Session::flash('success', 'Chỉnh sửa nhân viên' . ' ' . $request->name . ' ' . 'thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
        return $user;
    }
    public function getTrashed()
    {
        $users = $this->model->onlyTrashed();
        return $users->orderBy('id', 'DESC')->paginate(3);
    }

    public function restore($id)
    {
        $user = $this->model->withTrashed()->findOrFail($id);
        try {
            $user->restore();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $user;
    }

    public function force_destroy($id)
    {
        $user = $this->model->onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return $user;
    }
    public function provinces()
    {
        return Province::orderBy('id', 'DESC')->get();
    }
    public function districts()
    {
        return District::orderBy('id', 'DESC')->get();
    }
    public function wards()
    {
        return Ward::orderBy('id', 'DESC')->get();
    }
    public function update_info($request,$id)
    {
        $item=User::find($id);
        $item->name = $request->name;
        $item->address = $request->address;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->gender = $request->gender;
        $item->birthday = $request->birth_day;
        $item->province_id = $request->province_id;
        $item->district_id = $request->district_id;
        $item->ward_id = $request->ward_id;

        $file = $request->inputFile;
        if ($request->hasFile('inputFile')) {
            $images = 'public/images/user/'.$item->image;
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images_admin', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $item->image = $fileExtension;
        }
        try {
            $item->save();
            if(isset($fileExtension)){
                Storage::delete($images);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $image = 'public/images_admin/'.$fileExtension;
            Storage::delete($image);
        }
        return $item;
    }
}
