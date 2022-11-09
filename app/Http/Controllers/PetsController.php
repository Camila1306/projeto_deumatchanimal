<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Pet;
use Session;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::paginate(5);
        return view('pet.index', array('pets'=>$pets, 'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscar(Request $request)
    {
        $pets = Pet::where('nome', 'LIKE', '%'.$request->input('busca').'%')->orwhere('especie', 'LIKE', '%'.$request->input('busca').'%')->orwhere('porte', 'LIKE', '%'.$request->input('busca').'%')->orwhere('adaptacao', 'LIKE', '%'.$request->input('busca').'%')->orwhere('temperamento', 'LIKE', '%'.$request->input('busca').'%')->orwhere('idade', 'LIKE', '%'.$request->input('busca').'%')->orwhere('sexo', 'LIKE', '%'.$request->input('busca').'%')->orwhere('tamanho_pelo', 'LIKE', '%'.$request->input('busca').'%')->orwhere('cor_pelo', 'LIKE', '%'.$request->input('busca').'%')->get();
        return view('pet.index', array('pets'=>$pets, 'busca'=>$request->input('busca')));
    }  

    public function create()
    {
        return view('pet.create');
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
        $pet = new Pet();
        $pet->nome = $request->input('nome');
        $pet->especie = $request->input('especie');
        $pet->porte = $request->input('porte');
        $pet->adaptacao = $request->input('adaptacao');
        $pet->temperamento = $request->input('temperamento');
        $pet->idade = $request->input('idade');
        $pet->sexo = $request->input('sexo');
        $pet->tamanho_pelo = $request->input('tamanho_pelo');
        $pet->cor_pelo = $request->input('cor_pelo');
        $pet->historia = $request->input('historia');
        if($pet->save()){
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($pet->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('./img/pets'), $nomearquivo);
            } 
            Session::flash('mensagem', 'Cadastro de pet salvo com sucesso');
            return redirect('pets');
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
        $pet = Pet::find($id);
        return view('pet.show', array('pet'=>$pet));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = Pet::find($id);
        return view('pet.edit', array('pet'=>$pet));
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
        $pet = Pet::find($id);
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($pet->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('./img/pets'), $nomearquivo);
        }
        $pet->nome = $request->input('nome');
        $pet->especie = $request->input('especie');
        $pet->porte = $request->input('porte');
        $pet->adaptacao = $request->input('adaptacao');
        $pet->temperamento = $request->input('temperamento');
        $pet->idade = $request->input('idade');
        $pet->sexo = $request->input('sexo');
        $pet->tamanho_pelo = $request->input('tamanho_pelo');
        $pet->cor_pelo = $request->input('cor_pelo');
        $pet->historia = $request->input('historia');
        if($pet->save()){
            Session::flash('mensagem', 'Cadastro do pet alterado com sucesso');
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
        $pet = Pet::find($id);
        $pet->delete();
        Session::flash('mensagem', 'Cadastro do pet excluido com sucesso');
        return redirect(url('pets/'));
    }
}
