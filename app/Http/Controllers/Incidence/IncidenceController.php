<?php

namespace App\Http\Controllers\Incidence;

use App\Http\Requests\IncidenceRequest;
use App\Models\Device;
use App\Models\PersonalData;
use App\Models\Incidence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Notificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;


class IncidenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidences = Incidence::orderBy('state_id', 'asc')
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')->simplePaginate(25);
        return view('incidence.index', compact('incidences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_usuario = Auth::user()->id;
        $id_pd = PersonalData::where('user_id', $id_usuario)->select('id')->get();
        foreach($id_pd as $id){
            $id2 = $id->id;
        };
        $devices = Device::where('personal_id', $id2)->get();
        return view('incidence.create', compact('devices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidenceRequest $request)
    {
        $incidence = new Incidence();
        $file = $request->file('evidence');
        $file->move('uploads', $file->getClientOriginalName());
        $incidence->evidence = $file->getClientOriginalName();
        $incidence->description = $request->input('description');
        $incidence->device_id = $request->input('device_id');
        $incidence->state_id = $request->input('state_id', 1);
        $incidence->score = $request->input('score', 1);
        $incidence->diagnostic = $request->input('diasgnostic', 'Sin atender');
        // funcionario es a quien se le asigna == tecnico
        $incidence->functionary_id = $request->input('functionary_id', 1);
        $incidence->usuario_id = $request->input('usuario_id');
        $incidence->save();
        return redirect()->route('incidence.index')->with('success', 'Incidencia creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incidence = Incidence::findOrfail($id);
        if (is_null($incidence->t_response)) {
            $incidence->t_response = new DateTime(now());
            $incidence->save();
        }
        return view('incidence.show', ['incidence'=>$incidence]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidence = Incidence::findOrfail($id);
        // la incidencia esta cerrada, no se puede asignar
        if ($incidence->state_id===3){
            return redirect()->route('incidence.index')->with('success', 'La incidencia se ha atentido, no se puede asignar.');
        }
        $state = DB::table('state')->get();
        $functionary = DB::table('personal_data')->where('position_id', '<=', '2' )->get();
        return view('incidence.edit', ['incidence'=>$incidence, 'state'=>$state,
            'functionary'=>$functionary]);
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
            'functionary_id'=>'required|integer',
            'state_id'=>'required|integer',
            'usuario_id'=>'required|integer'
        ]);
        $iduser=$request['functionary_id'];
         User::find($iduser)->notify(new Notificacion);
        // dd(Auth::user()->personaldata->id);
        Incidence::whereId($id)->update($validatedData);

        return redirect()->route('incidence.index')->with('success', 'La incidencia se asigno correctamente.');
    }


    public function attend($id){
        $incidence = Incidence::findOrfail($id);
        if (is_null($incidence->t_response)) {
            $incidence->t_response = new DateTime(now());
            $incidence->save();
        }
        if ($incidence->state_id===3){
            return redirect()->route('incidence.index')->with('success', 'La incidencia ha sido atentido, consulte con el administrador.');
        }
        return view('incidence.attend', ['incidence'=>$incidence]);
    }

    public function close(Request $request, $id)
    {
        $incidence = Incidence::findOrfail($id);
        $id_func = $request->input('functionary_id');
        $id_func= (int)$id_func;
        if ($id_func === $incidence->functionary_id){
            $validatedData = $request->validate([
                'state_id'=>'required|integer',
                'diagnostic'=>'required',
                'functionary_id'=>'required|integer',
            ]);
            Incidence::whereId($id)->update($validatedData);
            $f_ini = new DateTime($incidence->created_at);
            $f_fin = new DateTime($incidence->updated_at);
            $t_response = new DateTime($incidence->t_response);
            $diff = $f_fin->diff($f_ini);
            $t_res = $f_fin->diff($t_response);
            $incidence->f_total = $diff->format("%dD:%hH:%iM:%sS");
            $incidence->t_response = $t_res->format("%dD:%hH:%iM:%sS");
            $incidence->save();
            return redirect()->route('incidence.index')->with('success', 'Incidencia cerrada correctamente.');
        }
        return redirect()->route('incidence.index')->with('success', 'Usted no tiene asignada esta incidencia, comuniquese con el administrador');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
