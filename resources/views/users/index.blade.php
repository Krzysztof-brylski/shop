@extends('layouts.app')
@section('content')
<div class="container">
@include('helpers.alerts')

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">{{__('id')}}</th>
            <th scope="col">{{__('Email Address')}}</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('Surname')}}</th>
            <th scope="col">{{__('Phone_number')}}</th>
            <th scope="col">{{__('Action')}}</th>
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
                @if($user->id!=Auth::user()->id)
                    <td><button  class="btn btn-danger btn-sm delete-button" data-id="{{$user->id}}">X</button></td>
                @else
                    <td><button  class="btn btn-danger btn-sm " disabled>X</button></td>
                @endif
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
