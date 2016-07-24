<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmallgroupsRequest;
use App\SmallGroup;

class SmallgroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smallgroups = SmallGroup::latest()->get()->all();

        return view('dashboard.smallgroups.smallgroup', compact('smallgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SmallGroup $smallgroup)
    {
        return view('dashboard.smallgroups.create', compact('smallgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SmallgroupsRequest $request)
    {
        SmallGroup::create($request->all());

        flash()->success('Hurray!', 'Successfully Added Smallgroup');

        return redirect('/home/smallgroups');
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
    public function edit(SmallGroup $smallgroup)
    {
        return view('dashboard.smallgroups.edit', compact('smallgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SmallGroup $smallgroup, SmallgroupsRequest $request)
    {
        $smallgroup->update($request->all());
        flash()->success('Awesome!', 'Successfully Created Smallgroup');

        return redirect('/home/smallgroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmallGroup $smallgroup)
    {
        $smallgroup->delete();
        flash()->success('Done.', 'Deleted Smallgroup');

        return redirect('/home/smallgroups');
    }
}
