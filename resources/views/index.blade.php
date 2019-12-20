@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 style="margin-top: 20px; margin-bottom: 20px;">Sistema de Entregas de Mercadorias a Clientes (<b>SEMC</b>)</h2>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sejá bem-vindo <b><i>{{Auth::user()->name}}</i></b> - Favor informar os dados da entrega do cliente!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="{{ url('/cadastrar') }}" method="POST">

                        <!-- csrf abaixo responsavel por requisição POST -->
                        @csrf

                        <label>Informe o nome do cliente</label> 
                        <input type="text" name="nome" class="form-control" placeholder="Ex: João da Silva" required> 

                        <br/>

                        <label>Informe a data da entrega</label> 
                        <input type="date" name="dataEntrega" class="form-control" required> 

                        <br/>

                        <label>Informe o endereço de partida</label> 
                        <input type="text" name="enderecoPartida" class="form-control" placeholder="Ex: Otavio mangabeira, São Gonçalo, trindade, 123" required> 

                        <br/>

                        <label>Informe o endereço de destino</label> 
                        <input type="text" name="enderecoDestino" class="form-control" placeholder="Ex: Washington Luiz, São Gonçalo, Gradim, 1700" required>     

                        <br/><br/>

                        <center>
                            <input type="submit" name="Cadastrar" value="Cadastrar SEMC" class="btn btn-primary">                   
                        </center>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection