<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $params = $request->all();
        $params = $request->validate([
            'name' => 'required|max:255',
            'address' => ['required', 'max:255'],
            'email' => 'required|max:255|email',
            'website' => 'required|max:255|url',
            'head_of_department' => 'required|max:255',
            'phone' => 'nullable|max:255'
        ]);
        // validare i dati che arrivano nella request

        $d = Department::create($params);

        return redirect()->route('admin.departments.show', $d);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        // $department = Department::findOrFail($id);

        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        // $department = Department::findOrFail($id);

        $params = $request->validate([
            'name' => 'required|max:255',
            'address' => ['required', 'max:255'],
            'email' => 'required|max:255|email',
            'website' => 'required|max:255|url',
            'head_of_department' => 'required|max:255',
            'phone' => 'nullable|max:255'
        ]);

        $department->update($params);

        return redirect()->route('admin.departments.show', $department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        // $department = Department::findOrFail($id);

        $department->delete();

        // Department::destroy($id);

        return redirect()->route('admin.departments.index');
    }
}
