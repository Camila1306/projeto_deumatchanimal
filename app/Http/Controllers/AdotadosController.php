<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Adotado;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Adotante;
use Illuminate\Support\Facades\DB;
use Session;

class AdotadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adotados = Adotado::paginate(5);
        return view('Adotado.index', array('adotados'=>$adotados, 'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request){
        
        $adotados = Adotado::join('pets', 'pets.id', '=', 'adotados.pet_id')->join('adotantes', 'adotantes.id', '=', 'adotados.adotante_id')->select('adotados.*', 'pets.nome', 'adotantes.nome')->where('pet_id', '=', $request->input('busca'))->orwhere('adotante_id', '=', $request->input('busca'))->orwhere('obs','LIKE', '%'.$request->input('busca').'%')->orwhere('pet.nome', 'LIKE', '%'.$request->input('busca'))->orwhere('adotante.nome', 'LIKE', '%'.$request->input('busca'))->simplepaginate(5);
        return view('Adotado.index', array('adotados'=>$adotados, 'busca'=>$request->input('busca')));
    }

    public function create()
    {
        $pets = Pet::all();
        $adotantes = Adotante::all();
        return view('Adotado.create', ['pets'=>$pets, 'adotantes'=>$adotantes]);
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
            'pet_id' => 'required',
            'adotante_id'=> 'required',
            'datahora' => 'required',
        ]);
        $adotado = new Adotado();
        $adotado->pet_id = $request->input('pet_id');
        $adotado->adotante_id = $request->input('adotante_id');
        $adotado->datahora = \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $request->input('datahora'));
        $adotado->obs = $request->input('obs');
        if($adotado->save()){
            return redirect('adotados');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adotado  $adotado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adotado = Adotado::find($id);
        return view('Adotado.show', array('adotado'=>$adotado));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adotado  $adotado
     * @return \Illuminate\Http\Response
     */
    public function edit(Adotado $adotado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adotado  $adotado
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Adotado $adotado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adotado  $adotado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->isAdmin()){
            $adotado = Adotado::find($id);
            $adotado->delete();
            Session::flash('mensagem', 'Adoção excluida com sucesso');
            return redirect(url('adotados/'));
        } else {
            return redirect('login');
        }
    }
}
