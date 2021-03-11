<?php

namespace App\Http\Controllers\Device;
use App\Models\Brand;
use App\Models\Os;
use App\Models\PersonalData;
use App\Models\State_device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\DeviceRequest;
use App\Models\CategoryHardware;
use App\Models\Dependence;
use App\Models\Device;
use DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::orderBy('updated_at', 'desc')->simplePaginate(20);
        return view('device.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = new PersonalData();
        $brand = new Brand();
        $clientIP = \Request::ip();
        $os = new Os;
        $state_device = new State_device();
        $dependence = new Dependence;
        $cat_hardware = new CategoryHardware;
        return view('device.create', ['dependence'=>$dependence->all(), 'cat_hardware'=>$cat_hardware->all(),
            'os'=>$os->all() ,'personal'=>$personal->all(), 'state_device'=>$state_device->all(),
            'brand'=>$brand->all() , 'clienteIP'=>$clientIP]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        $device = new Device;
        $device->insert($request->except('_token'));
        return redirect()->route('device.index')->with('success', 'Dispositivo creado con exito');
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
        $device = Device::findOrfail($id);
        $os = DB::table('os')->get();
        $brand = DB::table('brand')->get();
        $personal = DB::table('personal_data')->get();
        $state_device = DB::table('state_device')->get();
        $category = DB::table('category_hardware')->get();
        $dependence = DB::table('dependence')->get();

        return  view("device.edit", ["device"=>$device, "category"=>$category, "dependence"=>$dependence,
            "os"=>$os, "personal"=>$personal ,"state_device"=>$state_device, 'brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceRequest $request, $id)
    {
        Device::findOrfail($id)->update($request->all());
        return redirect()->route('device.index')->with('success', 'Dispositivo se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = new Device;
        $position->destroy($id);
        return redirect('device');
    }
}
