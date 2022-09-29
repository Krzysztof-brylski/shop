
@if(session('status'))
    <div class="row">
        <div class="col-12">
             <div class="alert alert-success alert-dismissible fade show" role="alert">

                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{session('status')}}
            </div>
        </div>
    </div>
@endif
