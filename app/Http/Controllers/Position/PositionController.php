<?php

namespace App\Http\Controllers\Position;

use App\Http\Requests\PositionRequest;
use App\Models\Dependence;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = new Position;
        return view('position.index')->with('position', $position->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = new Position();
        $dependence = new Dependence();
        return view('position.create', ['position'=>$position->all(), 'dependence'=>$dependence->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $position = new Position;
        $position->insert($request->except('_token'));
        return redirect('position');
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
        $position = Position::findOrfail($id);
        $dependence = DB::table('dependence')->get();
        return  view("position.edit", ["position"=>$position, "dependence"=>$dependence]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:50',
            'description'=>'required', 'max:100',
            'dependence_id'=>'required', 'max:100'
        ]);
        Position::whereId($id)->update($validatedData);
        return redirect()->route('position.index')->with('success', 'Cargo se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $position = new Position;
        $position->destroy($id);
        return redirect('position');
    }
}
