@extends('layouts.base')

@section('content')
<h1>Lista kontaktów:</h1>
        @php ($i = 1)
        @if(count($contacts) >= 1)
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numer telefonu:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                        <th scope="row">{{$i}}</th>
                        <td> {{$contact->number}}</td>
                        </tr>
                        @php ($i++)
                    @endforeach

                </tbody>
            </table>
        @else
            <p> Brak kontaktów</p>
        @endif

        <a href="/">Lista firm</a>
@endsection
