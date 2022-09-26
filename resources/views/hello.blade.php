@extends('layouts.app')
@section('content')
    <div class="nav-item dropdown  float-right">
        <label class="mr-2">View:</label>
        <a id="navbarDropdown" class="btn btn-lg btn-light  dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            9 <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">12</a>
            <a class="dropdown-item" href="#">24</a>
            <a class="dropdown-item" href="#">48</a>
            <a class="dropdown-item" href="#">96</a>
        </div>
    </div>
@endsection
