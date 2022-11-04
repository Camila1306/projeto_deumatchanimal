<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AnimaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animais = Animal::paginate(5);
        return view('animal.index', array('animais'=>$animais, 'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscar(Request $request){
        $animais = Animal::where('nome', 'LIKE', '%'.$request->input('busca').'%')->orwhere('especie', 'LIKE', '%'.$request('busca').'%')->orwhere('porte', 'LIKE', '%'.$request->input('busca').'%')->orwhere('adaptacao', 'LIKE', '%'.$request->input('busca').'%')->orwhere('temperamento', 'LIKE', '%'.$request->input('busca').'%')->orwhere('idade', 'LIKE', '%'.$request->input('busca').'%')->orwhere('sexo', 'LIKE', '%'.$request->input('busca').'%')->orwhere('tamanho_pelo', 'LIKE', '%'.$request->input('busca').'%')->orwhere('cor_pelo', 'LIKE', '%'.$request->input('busca').'%');
        return view('animal.index', array('animais'=>$animais, 'busca'=>$request->input('busca')));
    }   

    public function create()
    {
        return view('animal.create');
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
            'especie' => 'required',
            'porte' => 'required',
            'adaptacao' => 'required',
            'temperamento' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
            'tamanho_pelo' => 'required',
            'cor_pelo' => 'required',
            'historia' => 'required',

        ]);
        $animal = new Animal();
        $animal->nome = $request->input('nome');
        $animal->especie = $request->input('especie');
        $animal->porte = $request->input('porte');
        $animal->adaptacao = $request->input('adaptacao');
        $animal->temperamento = $request->input('temperamento');
        $animal->idade = $request->input('idade');
        $animal->sexo = $request->input('sexo');
        $animal->tamanho_pelo = $request->input('tamanho_pelo');
        $animal->cor_pelo = $request->input('cor_pelo');
        $animal->historia = $request->input('historia');
        if($animal->save()){
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($animal->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('./img/animais'), $nomearquivo);
            } 
            Session::flash('mensagem', 'Animal salvo com sucesso');
            return redirect('animais');
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
        $animal = Animal::find($id);
        return view('animal.show', array('animal'=>$animal));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animal.edit', array('animal'=>$animal));

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
        $this->validate($request, [
            'nome' => 'required',
            'especie' => 'required',
            'porte' => 'required',
            'adaptacao' => 'required',
            'temperamento' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
            'tamanho_pelo' => 'required',
            'cor_pelo' => 'required',
            'historia' => 'required',

        ]);
        $animal = Animal::find($id);
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($animal->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('./img/animais'), $nomearquivo);
        }
        $animal->nome = $request->input('nome');
        $animal->especie = $request->input('especie');
        $animal->porte = $request->input('porte');
        $animal->adaptacao = $request->input('adaptacao');
        $animal->temperamento = $request->input('temperamento');
        $animal->idade = $request->input('idade');
        $animal->sexo = $request->input('sexo');
        $animal->tamanho_pelo = $request->input('tamanho_pelo');
        $animal->cor_pelo = $request->input('cor_pelo');
        $animal->historia = $request->input('historia');
        if($animal->save()){
            Session::flash('mensagem', 'Animal alterado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        Session::flash('mensagem', 'Animal excluido com sucesso');
        return redirect(url('animais/'));
    }
}
