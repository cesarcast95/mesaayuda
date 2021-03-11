<?php

namespace App\Http\Controllers\CategoryHardware;

use App\Http\Requests\CategoryHardwareRequest;
use App\Models\CategoryHardware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Notificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CategoryHardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_hardware = new CategoryHardware();
        return view('category_hardware.index')->with('cat_hardware', $cat_hardware->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_hardware = new CategoryHardware;
        return view('category_hardware.create')->with('cat_hardware', $cat_hardware->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryHardwareRequest $request)
    {
        $cat_hardware = new CategoryHardware;
        $cat_hardware->insert($request->except('_token'));


        Auth::user('id')->notify(new Notificacion);
        return redirect('cat-hardware');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_hardware = CategoryHardware::findOrfail($id);
        return  view('category_hardware.edit', ["cat_hardware"=>$cat_hardware]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:50',
            'description'=>'required', 'max:100'
        ]);
        CategoryHardware::whereId($id)->update($validatedData);
        return redirect()->route('cat-hardware.index')->with('success', 'Categoria se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
