@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-md-8 order-md-2 col-lg-9">
            <div class="container-fluid">
                <div class="row   mb-5">
                    <div class="col-xl-6">
                        <div class="nav-item dropdown  float-right">
                            <label class="mr-2">Sort By:</label>
                            <a id="navbarDropdown" class="btn btn-lg btn-light current_order_selector dropdown-toggle" data-order="asc" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__('welcome.Filters.ASC')}} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu order_selector" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" data-order="asc" href="#">{{__('welcome.Filters.ASC')}}</a>
                                <a class="dropdown-item" data-order="desc" href="#">{{__('welcome.Filters.DESC')}}</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="nav-item dropdown  float-right">
                            <label class="mr-2">{{__('welcome.Headers.View')}}:</label>
                            <a id="navbarDropdown" class="btn btn-lg btn-light dropdown-toggle page_current_lim"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>9<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu page_lim" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">9</a>
                                <a class="dropdown-item" href="#">18</a>
                                <a class="dropdown-item" href="#">36</a>
                                <a class="dropdown-item" href="#">45</a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row" id="product_container">
                    @foreach($products as $product)
                        <div class="col-6 col-md-6 col-lg-4 mb-3">
                            <div class="card h-100 border-0">
                                <div class="card-img-top">
                                    @if(!is_null($product->image))
                                        <img src="{{asset('storage/'.$product->image)}}" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    @else
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    @endif
                                </div>
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                         {{$product->name}}
                                    </h4>
                                    <h5 class="card-price medium text-info">
                                        @if(isset($product->category->name))
                                        # {{__("welcome.Filters.".$product->category->name)}}
                                        @else
                                        # {{__("welcome.Filters.None")}}
                                        @endif
                                    </h5>
                                    <h5 class="card-price small text-warning">
                                        <i>PLN {{$product->price}}</i>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row sorting mb-5 mt-5">
                    <div class="col-12">
                        <a class="btn btn-light">
                            <i class="fas fa-arrow-up mr-2"></i> {{__("welcome.Buttons.Back-to-top")}}</a>
                        <div class="btn-group float-md-right ml-3">
                            <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                            <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                        </div>
                        <div class="nav-item dropdown  float-right">
                            <label class="mr-2">{{__('welcome.Headers.View')}}:</label>
                            <a id="navbarDropdown" class="btn btn-lg btn-light  dropdown-toggle page_current_lim"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>9<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu page_lim" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">9</a>
                                <a class="dropdown-item" href="#">18</a>
                                <a class="dropdown-item" href="#">36</a>
                                <a class="dropdown-item" href="#">45</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <form class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                <h3 class="mt-0 mb-5"><span class="text-primary">{{count($products)}}</span> {{__("welcome.Headers.Products")}}</h3>
                <h6 class="text-uppercase font-weight-bold mb-3">{{__("welcome.Headers.Categories")}}</h6>

                    @foreach($categories as $category)
                    <div class="mt-2 mb-2 pl-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="filters[categories][]" class="custom-control-input" id="category-{{$category->id}}" value="{{$category->id}}">
                            <label class="custom-control-label" for="category-1">{{__("welcome.Filters.$category->name")}}</label>
                        </div>
                    </div>
                    @endforeach
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">{{__("welcome.Headers.Price")}}</h6>
                <div class="price-filter-control">
                    <input type="number" class="form-control w-50 pull-left mb-2" min="0" placeholder="50" name="filters[price_min]" id="price-min-control">
                    <input type="number" class="form-control w-50 pull-right" min="0" placeholder="150" name="filters[price_max]" id="price-max-control">
                </div>
                <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <a href="#" class="btn btn-lg btn-block btn-primary mt-5 result_btn">{{__("welcome.Buttons.Update-results")}}</a>
            </form>

    </div>
</div>
@endsection
@section('javascript')
    const asset = "{{asset('storage/')}}";
@endsection
@section('js-files')

    @vite(['resources/js/filter.js'])
@endsection
