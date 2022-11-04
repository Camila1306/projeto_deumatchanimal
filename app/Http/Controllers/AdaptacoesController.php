<?php

namespace App\Http\Controllers;

use App\Models\Adaptacao;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdaptacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adaptacoes = Adaptacao::paginate(5);
        return view('adaptacao.index', array('adaptacoes'=>$adaptacoes, 'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function buscar(Request $request) {
        $adaptacoes = Adaptacao::where('tipo', 'LIKE'. '%'.$request->input('busca').'%');
        return view('adaptacao.index', array('adaptacoes'=>$adaptacoes, 'busca' => $request->input('busca')));
     }
    public function create()
    {
        return view('adaptacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adaptacao = new Adaptacao();
        $adaptacao->tipo = $request->input('tipo');
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
        $adaptacao = Adaptacao::find($id);
        $adaptacao->delete();
        Session::flash('mensagem', 'Adaptação excluida com sucesso');
        return redirect(url('adaptacoes/'));
    }
}
