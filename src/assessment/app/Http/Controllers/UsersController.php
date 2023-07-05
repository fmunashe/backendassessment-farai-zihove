<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $data = $request->except(['password_confirmation']);
        $data['password'] = Hash::make($data['password']);
        User::query()->create($data);
        toast('User Profile Successfully Created', 'success');
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): User
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user);
        $data = $request->except(['password_confirmation']);
        $data['password'] = $data['password'] ? Hash::make($data['password']) : $user->password;
        $user->update($data);

        toast('User Profile Successfully Updated', 'success');
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        if (auth()->user()->id == $user->id) {
            Alert::error('', 'You cannot delete your own profile');
            return redirect()->route('users.index');
        }
        $user->delete();
        toast('User Profile Successfully Removed', 'success');
        return to_route('users.index');
    }
}
