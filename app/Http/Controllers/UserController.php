<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $program_studi = ProgramStudi::all();
        
        return view('admin.create', compact('roles', 'program_studi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =validator( $request->all(),[
            'id' => 'required|digits:7',
            'name' => 'required|string|max:255',
            'password' => 'required|min:6',
            'role_id' => 'required|integer',
            'program_studi_id' => 'nullable|integer',
        ])->validate();
        $user = new User($validatedData);
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $newUSer = DB::table('user')->where('id', $validatedData['id'])->first();
        $users = User::all();
        if ($newUSer->role_id==4) {
            return view('mahasiswa.create')
            ->with('newUser', $newUSer)
            ->with('users', $users);
        } else {
            return redirect(route('adminList'))
            ->with('users', $users);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $programs = ProgramStudi::all();

        return view('admin.edit', compact('user', 'roles', 'programs'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'password' => 'nullable|max:8',
            'name' => 'required|string|max:100',
            'role_id' => 'required|integer',
            'program_studi_id' => 'nullable|integer',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        
        $user->update($validatedData);

        return redirect()->route('adminList')->with('success', 'Data user berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user == null) {
            return back()->withErrors(['err_msg' => 'User not found!']);
        }
    
        $user->delete();
    
        return redirect()->route('adminList')
            ->with('status', 'User successfully deleted!');
    }
}
