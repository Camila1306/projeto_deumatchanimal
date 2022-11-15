<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Adotante;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Session;

class AdotantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adotantes = Adotante::paginate(5);
        return view('Adotante.index', array('adotantes' => $adotantes, 'busca' => null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscar(Request $request)
    {
        $adotantes = Adotante::where('nome', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('email', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('telefone', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('rua', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('bairro', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('CEP', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('cidade', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('estado', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('casa_ap', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('viagem', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('renda', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('adaptacao', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('hobbies', 'LIKE', '%' . $request->input('busca') . '%')->orwhere('planejamento', 'LIKE', '%' . $request->input('busca') . '%')->paginate(5);
        return view('Adotante.index', array('adotantes' => $adotantes, 'busca' => $request->input('busca')));
    }

    public function create()
    {
        return view('Adotante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'CEP' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'casa_ap' => 'required',
            'viagem' => 'required',
            'renda' => 'required',
            'adaptacao' => 'required',
            'hobbies' => 'required',
            'planejamento' => 'required',
        ]);
        $adotante = new Adotante();
        $adotante->nome = $request->input('nome');
        $adotante->email = $request->input('email');
        $adotante->telefone = $request->input('telefone');
        $adotante->rua = $request->input('rua');
        $adotante->numero = $request->input('numero');
        $adotante->bairro = $request->input('bairro');
        $adotante->CEP = $request->input('CEP');
        $adotante->cidade = $request->input('cidade');
        $adotante->estado = $request->input('estado');
        $adotante->casa_ap = $request->input('casa_ap');
        $adotante->viagem = $request->input('viagem');
        $adotante->renda = $request->input('renda');
        $adotante->adaptacao = $request->input('adaptacao');
        $adotante->hobbies = $request->input('hobbies');
        $adotante->planejamento = $request->input('planejamento');
        if ($adotante->save()) {
            if ($request->hasFile('foto')) {
                $imagem = $request->file('foto');
                $nomearquivo = md5($adotante->id) . "." . $imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('./img/adotantes'), $nomearquivo);
            }
            Session::flash('mensagem', 'Cadastro de adotante salvo com sucesso');
            return redirect('adotantes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adotante  $adotante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adotante = Adotante::find($id);
        return view('Adotante.show', array('adotante' => $adotante));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adotante  $adotante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adotante = Adotante::find($id);
        return view('Adotante.edit', array('adotante' => $adotante));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adotante  $adotante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'CEP' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'casa_ap' => 'required',
            'viagem' => 'required',
            'renda' => 'required',
            'adaptacao' => 'required',
            'hobbies' => 'required',
            'planejamento' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $imagem = $request->file('foto');
            $nomearquivo = md5($adotante->id) . "." . $imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('./img/adotantes'), $nomearquivo);
        }
        $adotante = Adotante::find($id);
        $adotante->nome = $request->input('nome');
        $adotante->email = $request->input('email');
        $adotante->telefone = $request->input('telefone');
        $adotante->rua = $request->input('rua');
        $adotante->numero = $request->input('numero');
        $adotante->bairro = $request->input('bairro');
        $adotante->CEP = $request->input('CEP');
        $adotante->cidade = $request->input('cidade');
        $adotante->estado = $request->input('estado');
        $adotante->casa_ap = $request->input('casa_ap');
        $adotante->viagem = $request->input('viagem');
        $adotante->renda = $request->input('renda');
        $adotante->adaptacao = $request->input('adaptacao');
        $adotante->hobbies = $request->input('hobbies');
        $adotante->planejamento = $request->input('planejamento');
        if ($adotante->save()) {
            Session::flash('mensagem', 'Cadastro de adotante alterado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adotante  $adotante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $adotante = Adotante::find($id);
        if (isset($request->foto)) {
            unlink($request->foto);
        }
        $adotante->delete();
        Session::flash('mensagem', 'Adotante excluído com sucesso');
        return redirect(url('adotantes/'));
    }
}
