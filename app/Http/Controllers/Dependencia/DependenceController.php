<?php

namespace App\Http\Controllers\Dependencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DependenceRequest; // import regla de validacion
use App\Models\Dependence; // import model
use Illuminate\Support\Facades\Auth;

class DependenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // can('listar');
        $dependences = Dependence::all();
        return view('dependence.index', compact('dependences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DependenceRequest $request)
    {
        Dependence::create($request->all());
        return redirect()->route('dependence.index')->with('success', 'Dependencia creada con exito');
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
    {       can('editar');
            $dependence = Dependence::findOrFail($id);
            return view('dependence.edit', compact('dependence'));
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
            'name'=>'required|max:50|unique:dependence,name,'.$id,
            'description'=>'required', 'max:100',
            'ip1'=>'required|max:15|ip|unique:dependence,ip1,'. $id,
            'ip2'=>'required|max:15|ip|unique:dependence,ip2,'. $id,
        ]);
        Dependence::whereId($id)->update($validatedData);
        return redirect()->route('dependence.index')->with('success', 'Dependencia se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if ($request->ajax()) {
            if (Dependence::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }

    }


}


