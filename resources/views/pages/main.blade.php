@extends('layouts.base')

@section('content')
    <body class="antialiased">
        @if(count($companies) >= 1)
            @php ($i = 1)
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Miasto</th>
                    <th scope="col">Kontakty</th>
                    <th scope="col">Usuń</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td><a href="/edit_company/{{$company->id}}">{{$company->company_name}}</a></td>
                            <td>{{$company->company_city}}</td>
                            <td><a href="/contacts/{{$company->id}}">{{$company->number_of_contacts}}</a></td>
                            <td><a href="/delete/{{$company->id}}">X</a></td>
                        </tr>
                        @php ($i++)
                    @endforeach

                </tbody>
            </table>
        @else
            <p> No companies</p>
        @endif

        <a href="/add_company">Dodaj nową firme</a>
@endsection