@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados da Aposta
                        <a href="{{ route('apostas.index') }}" class="btn btn-success btn-sm float-end">
                            Listar Apostas
                        </a> </div>
                    <div class="card-body">
                        @if (Session::has('menssagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('menssagem_sucesso') }}
                            </div>
                        @endif
                        @if (Session::has('menssagem_erro'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('menssagem_erro') }}
                            </div>
                        @endif

                        {!! Form::open(['method'=>'POST','url' => route('apostas.store')]) !!}

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::input('text','nome',null,['class'=>'form-control mb-3','placeholder'=>'Nome','required','maxlenght'=>50,'autofocus']) !!}
                            {!! Form::label('valor', 'Valor') !!}
                            {!! Form::number('valor', null, ['class' => 'form-control', 'placeholder' => 'Valor', 'required', 'autofocus']) !!}
                            {!! Form::submit('Salvar',['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
