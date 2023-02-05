@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>Promotion Codes</h2>
            <a class="btn btn-success" href="{{route('promoCode.create')}}">Create Code</a>
        </div>

        <table class="table table-hover my-2">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Code</th>
                <th scope="col">Discount (PLN)</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($codes as $code)
                <tr>
                    <td>{{$code->id}}</td>
                    <td>{{$code->code}}</td>
                    <td>- {{$code->discount}}</td>
                    <td>
                        <form method="post" action="{{route('promoCode.destroy',['promoCode'=>$code->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">U</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$codes->links()}}
    </div>
@endsection
