@extends('layouts.base')

@section('content')
    Wprowadź zmiany w firmie: {{$company->company_name}} Miasto:{{$company->company_city}}:
                {!! Form::open(['action' => 'CompaniesController@editSave', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('company_name','Name')}}
                        {{Form::text('company_name','',['class' => 'form-control', 'placeholder' => 'Nazwa firmy'])}}

                        {{Form::label('company_city','City')}}
                        {{Form::text('company_city','',['class' => 'form-control', 'placeholder' => 'Miasto'])}}
                        {{ Form::hidden('company_id', $company->id) }}
                    </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}       

                <a href="/">Lista firm</a>
@endsection
