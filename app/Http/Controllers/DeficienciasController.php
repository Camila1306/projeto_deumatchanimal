<?php

namespace App\Http\Controllers;

use App\Models\Deficiencia;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class DeficienciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deficiencias = Deficiencia::paginate(5);
        return view('deficiencia.index', array('deficiencias'=>$deficiencias, 'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $deficiencias = Deficiencia::where('tipo', 'LIKE'. '%'.$request->input('busca').'%');
        return view('deficiencia.index', array('deficiencias'=>$deficiencias, 'busca' => $request->input('busca')));
     }

    public function create()
    {
        return view('deficiencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deficiencia = new Deficiencia();
        $deficiencia->tipo = $request->input('tipo');
        if($deficiencia->save()) {
            return redirect('deficiencias');
        }
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
        $deficiencia = Deficiencia::find($id);
        $deficiencia->delete();
        Session::flash('mensagem', 'Deficiencia excluida com sucesso');
        return redirect(url('deficiencias/'));
    }
}
