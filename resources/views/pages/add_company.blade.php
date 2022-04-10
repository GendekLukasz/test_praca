@extends('layouts.base')

@section('content')
    Nowa firma:
        {!! Form::open(['action' => 'CompaniesController@addSave', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('company_name','Name')}}
                {{Form::text('company_name','',['class' => 'form-control', 'placeholder' => 'Nazwa firmy'])}}
                
                {{Form::label('company_city','City')}}
                {{Form::text('company_city','',['class' => 'form-control', 'placeholder' => 'Miasto'])}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}    

        
    <a href="/">Lista firm</a>
@endsection

