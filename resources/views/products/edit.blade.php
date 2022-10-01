@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('product.Titles.Edit_form',['name'=>$product->name])}}</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="product_edit_form" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method("PATCH")
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{$product->name}}" required  autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{__('Description')}}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{$product->description}}</textarea>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{__('Amount')}}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{$product->amount}}" required autofocus>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{__('Price')}}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product->price}}" required>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{__('Categories')}}</label>

                                <div class="col-md-6">
                                    <select id="category_id" form="product_edit_form" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">Brak</option>
                                        @foreach($categories as $category )
                                            @if($product->hasSelectedCategory($category->id))
                                                <option value="{{$category->id}}" selected>{{__("welcome.Filters.".$category->name)}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{__("welcome.Filters.".$category->name)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">{{__('Image')}}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('price') is-invalid @enderror"  name="image">
                                    @error('image')
                                    <span class="invalid-feedback"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                @if(!is_null($product->image))
                                    <a href="{{ route('products.downloadImage', $product->id)}}" style="width: initial; height: initial;">
                                        <img style="width: 350px;height: 250px;" src="{{asset('storage/'.$product->image)}}">
                                    </a>

                                @endif
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('product.Buttons.Save_button')}}
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
