<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class professorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::with('department')->get();
        return view('Admin.Professor.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=Department::all();
        return view('Admin.Professor.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'     => ['required'],
            'email' => ['required', 'email', 'unique:professors,email,' . $professor->id],
            'password' => ['required'],
            'depId'    => ['required', 'exists:departments,id']
        ]);

        // hash password
        $input['password'] =Hash::make($input['password']);

        Professor::create($input);

        return redirect()->route('professor.index')->with('success', 'Professor is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        return view('Admin.Professor.details', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
       $departments=Department::all();
        return view('Admin.Professor.edit', compact(['professor','departments']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professor $professor)
    {
        $input = $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:professors,email,'],
            'password' => ['nullable'],
            'depId'    => ['required', 'exists:departments,id']
        ]);

        // update password only if provided
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $professor->update($input);

        return redirect()->route('professor.index')->with('success', 'Professor is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professor.index')->with('success', 'Professor is deleted successfully');
    }
}


