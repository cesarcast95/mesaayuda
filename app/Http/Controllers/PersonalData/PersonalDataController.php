<?php

namespace App\Http\Controllers\PersonalData;
use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalData;
use App\Models\Position;
use DB;

use function PHPSTORM_META\type;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id2 = 0;
        $personaldata = new PersonalData();
        $idusuario = Auth::user()->id;
        $id_pd = PersonalData::where('user_id', $idusuario)->select('id')->get();
        foreach($id_pd as $id){
            $id2 = $id->id;
        };
        $devices = Device::where('personal_id', $id2)->get();
        return view('personal_data.index')->with('devices', $devices)
        ->with('personaldata', $personaldata->where('user_id','=',$idusuario)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = new Position;
        return view('personal_data.create')->with('position', $position->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personaldata = new PersonalData();
        $personaldata->insert($request->except('_token'));
        return redirect('personal-data')->with('mensaje', 'Datos personale agregados con éxito');
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
        $personaldata = PersonalData::findOrfail($id);
        $position = DB::table('position')->get();
        return view("personal_data.edit", ["personaldata"=>$personaldata, "position"=>$position]);
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
            'last_name'=>'required|max:100',
            'user_id'=>'required',
            'position_id'=>'required'
        ]);
        PersonalData::whereId($id)->update($validatedData);
        return redirect()->route('personal-data.index')->with('success', 'Su información ha sido actualizada correctamente.');
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
