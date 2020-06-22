<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Menampilkan data user.
     * Role = Admin
     *
     * @return data user
     */
    public function index()
    {
    	$data['mainTitle'] = 'User';
    	$data['firstPage'] = 'Admin';
    	$data['secondPage'] = 'User';
    	$data['kel'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Menampilkan data user.
     * Role = Admin
     *
     * @return data user
     */
    public function create()
    {
    	$data['mainTitle'] = 'User';
    	$data['firstPage'] = 'Admin';
    	$data['secondPage'] = 'User';
        return view('admin.user.create', $data);
    }


    /**
     * insert data user.
     * Role = Admin
     *
     * @return data user
     */
    public function store(Request $request)
    {
        $status = 200;
        $message = 'User added!';
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
		]);
        $requestData = $request->all();
        $res = User::create([
            'name' => $requestData['name'],
            'phone' => $requestData['phone'],
            'email' => $requestData['email'],
            'role' => $requestData['role'],
            'password' => Hash::make('123456'),
        ]);

        
        if(!$res){
            $status = 500;
            $message = 'User Not added!';
        }
        if($request->ajax()){
            return response()->json(['flash_status'=>$status, 'flash_message'=>$message]);
        }
        return redirect('admin/user')
            ->with(['flash_status' => $status,'flash_message' => $message]);
    }


    /**
     * update data user.
     * Role = Admin
     *
     * @param $id
     * @return data user
     */
    public function verif($id)
    {
        $status = 200;
        $message = 'User updated!';
        $user = User::find($id);
        $res = $user->update(['status'=>!$user->status]);
        if(!$res){
            $status = 500;
            $message = 'User Not updated!';
        }

        // if($request->ajax()){
        //     return response()->json(['flash_status'=>$status, 'flash_message'=>$message]);
        // }
        return redirect('admin/user')
            ->with(['flash_status' => $status,'flash_message' => $message]);
    }


    /**
     * delete data user.
     * Role = Admin
     *
     * @param $id
     * @return data user
     */
    public function destroy($id)
    {
        $status = 200;
        $message = 'User deleted!';
        $res = User::destroy($id);
        if(!$res){
            $status = 500;
            $message = 'User Not deleted!';
        }

        return redirect('admin/user')
            ->with(['flash_status' => $status,'flash_message' => $message]);
    }
}
