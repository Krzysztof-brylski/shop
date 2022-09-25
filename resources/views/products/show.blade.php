@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('product.Titles.Show_form',['name'=>$product->name])}}</div>
                    <div class="card-body">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"  value="{{$product->name}}" required readonly autofocus disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" maxlength="1500" class="form-control " name="description" autofocus readonly disabled>{{$product->description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">ilość</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" min="0" class="form-control" name="amount" value="{{$product->amount}}" disabled required readonly autofocus>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">Cena</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" min="0" step="0.01" class="form-control" name="price" value="{{$product->price}}"  disabled readonly required>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <img style="width: 350px;height: 250px;" src="{{asset('storage/'.$product->image)}}">
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{route('products.index')}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{__('product.Buttons.Back_button')}}
                                        </button>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
