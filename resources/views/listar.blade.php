@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 style="margin-top: 20px; margin-bottom: 20px;">Sistema de Entregas de Mercadorias a Clientes (<b>SEMC</b>)</h2>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sejá bem-vindo <b><i>{{Auth::user()->name}}</i></b> - Página referente a lista de entrega há fezer!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      <center>
                        <h4>Lista de Entregas</h4>
                      </center>
                      
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Nome do Cliente</th>
                              <th scope="col">Data da Entrega</th>
                              <th scope="col">Endereço Partida</th>
                              <th scope="col">Endereço Destino</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($listaDeEntregas as $entregas)

                            <tr>
                              <th scope="row">{{ $entregas->nome }}</th>
                              <td>{{date( 'd/m/Y', strtotime($entregas->data_entrega))}}</td>
                              <td>{{ $entregas->endereco_partida }}</td>
                              <td>{{ $entregas->endereco_destino }}</td>
                              <td><a href="/detalhesEntrega/{{ $entregas->endereco_partida }}/{{ $entregas->endereco_destino }}" class="btn btn-success btn-sm">Entregar</a></td>
                            </tr>

                            @endforeach
                          </tbody>
                        </table>

                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection