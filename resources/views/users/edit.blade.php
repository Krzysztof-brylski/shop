@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('product.Titles.Edit_form',['name'=>$user->email])}}</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="product_edit_form" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">Miasto:</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$user->address->city}}" max="255" required autocomplete="city" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-end">Kod pocztowy:</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" min="6" max="6" required autocomplete="surname" autofocus>

                                    @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="street" class="col-md-4 col-form-label text-md-end">Ulica:</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" max="255" required  autocomplete="street" autofocus>

                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="street_no" class="col-md-4 col-form-label text-md-end">Nr domu:</label>

                                <div class="col-md-6">
                                    <input id="street_no" type="text" class="form-control @error('street_no') is-invalid @enderror" name="street_no" value="{{ old('street_no') }}" max="5" required autocomplete="email">

                                    @error('street_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_no" class="col-md-4 col-form-label text-md-end">Nr Mieszkania</label>

                                <div class="col-md-6">
                                    <input id="home_no" type="text" class="form-control @error('home_no') is-invalid @enderror" name="home_no" required autocomplete="new-password">

                                    @error('home_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Zapisz Adres
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
