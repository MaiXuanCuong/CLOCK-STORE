<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordByMailRequets;
use App\Http\Requests\UpdateUserInfeRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Customer;
use App\Models\District;
use App\Models\Group;
use App\Models\Province;
use App\Models\Ward;
use App\Models\User;


use App\Services\Group\GroupServiceInterface;
use App\Services\User\UserServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userService;
    protected $groupService;

    public function __construct(UserServiceInterface $userService, GroupServiceInterface $groupService)
    {
        $this->userService = $userService;
        $this->groupService = $groupService;
    }

    public function index(Request $request)
    {
        $groups=Group::get();
        $provinces=Province::get();
        $this->authorize('viewAny', User::class);
        $users = $this->userService->all($request);
        return view('admin.users.index', compact('users','groups','provinces'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', User::class);
        $groups = $this->groupService->all($request);
        $provinces = $this->userService->provinces();
        // $districts = $this->userService->districts();
        // $wards = $this->userService->wards();
        return view('admin.users.add', compact('groups', 'provinces'));
    }
    public function GetDistricts(Request $request)
    {
        $province_id = $request->province_id;
        $allDistricts = District::where('province_id', $province_id)->get();
        return response()->json($allDistricts);
    }
    public function getWards(Request $request)
    {
        $district_id = $request->district_id;
        $allWards = Ward::where('district_id', $district_id)->get();
        return response()->json($allWards);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->userService->create($request);
            Session::flash('success', config('define.store.succes'));
            DB::commit();
            return redirect()->route('users.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('errors' . $e->getMessage() . ' getLine' . $e->getLine());
            Session::flash('error', config('define.store.error'));
            return redirect()->route('users.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('admin.users.login');
        }
    }
    public function show($id)
    {
        $user = $this->userService->find($id);
        return view('admin.users.detail', compact('user'));
    }


    public function edit($id)
    {
        $this->authorize('update', User::class);
        $users = $this->userService->find($id);
        // dd($users);
        $groups = $this->groupService->all($id);
        $provinces = $this->userService->provinces();
        $districts = $this->userService->districts();
        $wards = $this->userService->wards();
        $this->authorize('update', $users);
        return view('admin.users.edit', compact('groups', 'users', 'provinces', 'districts', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)

    {
        try {
            DB::beginTransaction();
            $this->userService->update($request,$id);
            Session::flash('success', config('define.update.succes'));
            DB::commit();
            return redirect()->route('users.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('errors' . $e->getMessage() . ' getLine' . $e->getLine());
            Session::flash('error', config('define.update.error'));
            return redirect()->route('users.index');
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        try {
            DB::beginTransaction();
            $this->userService->delete($id);
            Session::flash('success', config('define.recycle.succes'));
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('errors' . $e->getMessage() . ' getLine' . $e->getLine());
            Session::flash('error', config('define.recycle.error'));
            return redirect()->route('users.index');
        }
    }
    public function getTrashed()
    {
        $users = $this->userService->getTrashed();
        $params = [
            'users' => $users,
        ];
        return view('admin.users.recycle', $params);
    }

    public function restore($id)
    {
        $this->authorize('restore', User::class);
        try {
            DB::beginTransaction();
            $this->userService->restore($id);
            Session::flash('success', config('define.restore.succes'));
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('errors' . $e->getMessage() . ' getLine' . $e->getLine());
            Session::flash('error', config('define.restore.error'));
            return redirect()->route('users.index');
        }
    }

    public function force_destroy($id)
    {
        $this->authorize('forceDelete', User::class);
        try {
            DB::beginTransaction();
            $this->userService->force_destroy($id);
            Session::flash('success', config('define.delete.succes'));
            DB::commit();
            return redirect()->route('user.getTrashed');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('errors' . $e->getMessage() . ' getLine' . $e->getLine());
            Session::flash('error', config('define.delete.error'));
            return redirect()->route('user.getTrashed');
        }
    }
    public function info()
    {
        $item = Auth()->user();
        return view('admin.Users.infor', compact('item'));
    }

    public function update_info(UpdateUserInfeRequest $request,$id)
    {
        try {
            $item= $this->userService->update_info($request, $id);
            $item->save();
            Session::flash('success', config('define.update.succes'));
            return redirect()->route('user.info');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', config('define.update.error'));
            return redirect()->route('user.info',Auth()->user()->id);
        }
    }
    public function change_password(UpdateUserPasswordRequest $request)
    {
        if($request->renewpassword==$request->newpassword)
        {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item=User::find(Auth()->user()->id);
                $item->password= bcrypt($request->newpassword);
                $item->save();
                Session::flash('success', config('define.update.succes'));
                return redirect()->route('user.info');
            }else{
            Session::flash('error', config('define.update.error'));
                return redirect()->route('user.info');
            }
        }else{
            Session::flash('error', config('define.update.error'));
            return redirect()->route('user.info');
        }
    }
    public function password_by_email(UpdatePasswordByMailRequets $request)
    {
            if ($request->email == Auth()->user()->email) {
                $password = Str::random(6);
                $item=User::find(Auth()->user()->id);
                $item->password= bcrypt($password);
                $item->save();
                $params = [
                    'name' => Auth()->user()->name,
                    'password' => $password,
                ];
                Mail::send('admin.emails.password', compact('params'), function ($email) {
                    $email->subject('TCC-Shop');
                    $email->to(Auth()->user()->email, Auth()->user()->name);
                });
                Session::flash('success', config('define.update.succes'));
                return redirect()->route('user.info');
            }else{
            Session::flash('error', config('define.update.error'));
                return redirect()->route('user.info');
            }
    }
    public function accountByEmail(UpdatePasswordByMailRequets $request){
        $user = DB::table('users')->where('email', $request->email)->first();
        if($request->email == $user->email){
            try {
            $password = Str::random(6);
            $item=User::find($user->id);
            $item->password= bcrypt($password);
            $item->save();
            $params = [
                'name' => $user->name,
                'password' => $password,
            ];
            Mail::send('admin.emails.password', compact('params'), function ($email) use($user) {
                $email->subject('TCC-Shop');
                $email->to($user->email, $user->name);
            });
            Session::flash('success', config('define.update.succes'));
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
        } else{
            Session::flash('error', config('define.update.error'));
                return redirect()->route('login');
            }
    }
    public function changePassByEmailCustomer(UpdatePasswordByMailRequets $request){
        $customer = DB::table('customers')->where('email', $request->email)->first();
        if(!$customer){
            return response()->json([
                'message' => 'Mail không tồn tại',
                'status' => false,
            ], 401);
        }
        if($request->email == $customer->email && $customer->phone !=0){
            try {
            $password = Str::random(6);
            $item=Customer::find($customer->id);
            $item->password= bcrypt($password);
            $item->save();
            $params = [
                'name' => $customer->name,
                'password' => $password,
            ];
            Mail::send('admin.emails.password', compact('params'), function ($email) use($customer) {
                $email->subject('TCC-Shop');
                $email->to($customer->email, $customer->name);
            });
            return response()->json([
                'message' => 'Gửi mật khẩu về mail thành công',
                'user' => $customer,
            ], 201);
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            return response()->json([
                'message' => 'Mail không tồn tại',
                'status' => false,
            ], 401);
        }
        } else{
            return response()->json([
                'message' => 'Mail không tồn tại',
                'status' => false,
            ], 401);
            }
    }
}
