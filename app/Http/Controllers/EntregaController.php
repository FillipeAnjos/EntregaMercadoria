<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//Import DB usado para fazer query's DB's
use Illuminate\Support\Facades\Auth; // serve para pegar o id, email e nome do login
use App\EntregaModel;
use Session; //aqui eu importo a session para a mensagem do flash funcionar

class EntregaController extends Controller
{
    
     
	public function __construct(){
        $this->middleware('auth');
    }	
    


    public function index(){
    	return view('index');
    }

    public function cadastrarEntrega(Request $request){

    	$entrega = new EntregaModel();

    	//dd($request->dataEntrega);
        
        $insertEntrega = $entrega->create([
            'nome'             => $request->nome, 
            'data_entrega'     => $request->dataEntrega,
            'endereco_partida' => $request->enderecoPartida,
            'endereco_destino' => $request->enderecoDestino,
        ]);

        if($insertEntrega){
            Session::flash('cadastrarEntregaSucesso', 'Entrega cadastrada com sucesso. Favor informar ao cliente!');
            return view('index');
        }else{
            Session::flash('cadastrarEntregaError', 'Desculpe ocorreu um erro ao cadastrar a entrega!');
            return view('index');
        }
    	
    }

    public function listarEntrega(){

    	$listaDeEntregas = DB::table('entrega')->get();

    	//dd($listaDeEntregas[0]->nome);

    	return view('listar', compact('listaDeEntregas'));
    }

    public function mapaEntrega(){

        return view('mapa');
    }

    public function detalhesEntrega($partida, $destino){

        //Entrega partida - latitude e longetude 
        $par = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={{$partida}}&key=AIzaSyAp5kyWeRy55Lqa9O2RbJ1q9D6-y3X8II4"));

        //Entrega Destino - latitude e longetude
        $des = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={{$destino}}&key=AIzaSyAp5kyWeRy55Lqa9O2RbJ1q9D6-y3X8II4"));
        

        dd($par->results[0]->geometry->location->lat, $par->results[0]->geometry->location->lng, 
            $des->results[0]->geometry->location->lat, $des->results[0]->geometry->location->lng);

        
    }

    


}
