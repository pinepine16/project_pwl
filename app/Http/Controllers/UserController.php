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
            'name' => 'required|string|max:255',
            'password' => 'required|min:6',
            'role_id' => 'required|integer',
            'program_studi_id' => 'nullable|integer',
        ])->validate();

        DB::statement("CALL insert_user(?, ?, ?, ?)", [
            Hash::make($request->password),
            $request->name,
            $request->role_id,
            $request->program_studi_id
        ]);
        return redirect()->route('adminList')->with('success', 'User berhasil ditambahkan!');
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
