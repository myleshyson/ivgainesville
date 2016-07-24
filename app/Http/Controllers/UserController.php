<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPhoto;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->get()->all();

        $user = User::find(1);

        return view('dashboard.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Add a Photo to user.
     *
     * @param  $id      
     * @param Request $request
     */
    public function addPhoto($id, Request $request)
    {
        $file = $request->file('file');

        $name = time().$file->getClientOriginalName();

        $file->move('user/photos', $name);

        $user = User::find($id);

        $user->photo()->create(['path' => 'user/photos/'.$name]);
    }

    /**
     * Delete a Photo to user.
     *
     * @param  $id      
     * @param Request $request
     */
    public function deletePhoto($id)
    {
        $photo = UserPhoto::findOrFail($id);

        $photo->delete();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = UserPhoto::findOrFail($id);

        $photo->delete();

        return redirect()->back();
    }
}
