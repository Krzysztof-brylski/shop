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
<script type="module" defer>
$(function () {
    $('.delete-button').click(function(){
        const id = $(this).data("id");
        $.ajax({
            method:"DELETE",
            url:"/users/" + id,
        }).done(function (response) {
            alert("SUCCES");
            window.location.reload();
        }).fail(function (response) {
            alert("ERROR");
        })
    });

});
</script>
@endsection
