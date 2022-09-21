@extends('layouts.app')
@section('content')
<div class="container">


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">E-mail</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Nr-telefonu</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>@if($user->surname == null) ### @else {{$user->surname}}@endif</td>
                <td>@if($user->phone_number == null) ### @else {{$user->phone_number}}@endif</td>
                <td><button  class="btn btn-danger btn-sm delete-button" data-id="{{$user->id}}">X</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$users->links()}}

@endsection
@section('javascript')
    const deleteUrl="{{ url('users') }}/";
@endsection
@section('js-files')
    @vite('resources/js/delete.js')
@endsection
