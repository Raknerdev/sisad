<?php

namespace App\Http\Controllers\facturacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Permiso;
use App\Models\facturacion\Reportes;
use App\Models\User;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function reporte()
    {
        $totalMonto = 0;
        $totalAbono = 0;
        $totalResta = 0;
        $totalDescontado = 0;
        $reportes = Reportes::orderBy('id')->get();
        foreach ($reportes as $reporte) {
            $total = $total + $reporte->id;
        }
        if ($reportes) {
            return view('reports.reporte', compact('reportes',
            'totalMonto','totalAbono','totalResta','totalDescontado'));
        }else{
            return view('reports.reporte', compact(
            'totalMonto','totalAbono','totalResta','totalDescontado'));
        }
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
        //
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
        //
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
        //
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
