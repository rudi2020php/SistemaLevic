<?php

namespace App\Http\Controllers;

use App\Models\solicitudes;
use Illuminate\Http\Request;

class ControllerSolicitudes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soli = solicitudes::get();

        foreach ($soli as $solicitud) {
            $solicitud->view_Solicitud = [
                'href' => 'Solicitud # ' . $solicitud->id,
                'method' => 'GET'
            ];
        }

        $response = [
            'msg' => 'list of all solicitudes ',
            'solicitudes' => $soli
        ];

        //return response()->json($response, 200);
        return view('solicitud.datatables', compact('soli'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dpto' => 'required'
        ]);

        $soli = new solicitudes();
       $soli->name = $request->name;
       $soli->dpto_id = $request->dpto;
        $soli->save();

        //return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soli = solicitudes::find($id);
    
        //return view('show', compact('soli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, solicitudes $soli)
    {
        $request->validate([
            'name' => 'required',
            'dpto' => 'required'
        ]);

        $soli->name = $request->name;
        $soli->dpto_id = $request->dpto;
        $soli->save();

        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(solicitudes $soli)
    {
        $soli->delete();
        return redirect()->route('persona.index');
    }
}
