<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDOException;

class UserController extends Controller
{
    public function index(){
        $users = User::get();

        return view('admin.role-permission.user.index', compact(['users']));
    }

    public function create(){
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.role-permission.user.create', compact(['roles']));
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required', 'unique:users',
            'email'=> 'required', 'unique:users,email', 'email', 'max:255',
            'password'=> 'required', 'string', 'min:8', 'max:20',
            'roles' => "required"
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' =>Hash::make($request->password),
            'email' =>$request->email
        ]);
        $user->syncRoles($request->roles);
        return redirect('admin/users')->with('status', 'User created and role assigned successfully');
    }

    public function edit(User $user){
       $roles = Role::pluck('name', 'name')->all();
       $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('admin.role-permission.user.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user){
         $request->validate([
            'name'=> 'required', 'unique:users',
            'password'=> 'nullable', 'string', 'min:8', 'max:20',
            'roles' => "required"
        ]);
        $data = [
            'name'=>$request->name,
            'email' => $request->email,
          
        ];

        if(!empty($request->password)){
            $data += [
                 'password' =>Hash::make($request->password) 
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('admin/users')->with('status', "user updated");
    }

    public function destroy($userId){
        $user = User::findorfail($userId);
        $user->delete();
           return redirect('admin/users')->with('status', "user deleted");
    }
}

