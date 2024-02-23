@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Blank Page') }}</h1>

    <!-- Main Content goes here -->
    <div class="alert alert-primary" role="alert">
        This is a primary alert—check it out!
      </div>
    <div class="mx-auto" style="width: 200px; background-color:aqua;">
        Centered element
    </div>

    <div class="row">
        <div class="col">
            <div class="alert bg-secondary bg-gradient" role="alert">
                This is a primary alert—check it out!
            </div>
        </div>
        <div class="col">
            <div class="alert bg-secondary bg-gradient" role="alert">
                This is a primary alert—check it out!
            </div>
        </div>
        <div class="col">
            <div class="alert alert-success" role="alert">
                This is a primary alert—check it out!
            </div>
        </div>
        <div class="col">
            <div class="alert alert-danger" role="alert">
                This is a primary alert—check it out!
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="width: 14rem;">
            
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <img class="card-img-top" src="{{ asset('img/beras.jpg') }}" alt="Card image cap">
                <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the card's content.</p>
                <p><span style=" color: #ffac33;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </span> 4.6 <span class="rate">(19.730)</span></p>
                <h6 class="lineThroughText">10.99$</h6>
                <h5 class="price">10.99$</h5>
            </div>
            
        </div>
    </div>
    <!-- End of Main Content -->
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endpush
