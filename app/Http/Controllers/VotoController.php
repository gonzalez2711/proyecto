<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eleccion;
use App\Models\Casilla;
use App\Models\Voto;

use Illuminate\Support\Facades\DB;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votos = DB::table('voto')
            ->join('eleccion', 'voto.eleccion_id', '=', 'eleccion.id')
            ->join('casilla', 'voto.casilla_id', '=', 'casilla.id')
            ->select('voto.id', 'eleccion.periodo as eleccion', 'casilla.ubicacion as casilla', 'evidencia')
            ->get();

        return view("voto/list",
        compact("votos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elecciones = Eleccion::all();
        $casillas = Casilla::all();

        return view("voto/create", 
        compact("elecciones","casillas"));

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
            'casilla_id' => 'required|integer',
            'eleccion_id'=>'required|integer',
            'evidencia' => 'required|max:200'
        ]);

        
        $data = [
            "casilla_id" => $request->casilla_id ,
            "eleccion_id" => $request->eleccion_id,
            "evidencia" => $request->evidencia

        ];
        
        Voto::create($data);
        return redirect('voto')->with('success',
            ' guardado satisfactoriamente ...');
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
        $elecciones = Eleccion::all();
        $casillas = Casilla::all();
        $voto = Voto::find($id);

        return view("voto/edit", 
        compact("voto","elecciones","casillas"));
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
        $request->validate([
            'casilla_id'=>'required|integer',
            'eleccion_id'=>'required|integer',
            'evidencia' => 'required|max:200'

        ]);
        
        $data = [
            "casilla_id" => $request->casilla_id ,
            "eleccion_id" => $request->eleccion_id,
            "evidencia" => $request->evidencia
        ];
        
        Voto::find($id)->update($data);
        return redirect('voto')->with('success',
            ' Cambio realizado ...');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voto::find($id)->delete();
        return redirect('voto');
    }
}
