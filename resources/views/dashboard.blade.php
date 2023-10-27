@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="page-header text-center">
            <h1>Available Cars!</h1>
        </div>
        {{-- @dd($car) --}}

        <div class="row g-4">

            @forelse ($car as $c)
                <div class="col-lg-3 col-md-4">
                    <div class="card">
                        <div class="card-header text-capitalize">{{ $c->car_type->type }}</div>
                        <div class="card-body">
                            <h5 class="card-title text-capitalize">{{ $c->name }}</h5>
                            <p class="card-text text-capitalize">Speed:{{ $c->speed }}</p>
                            <p class="card-text text-capitalize">Price:{{ $c->price }}</p>
                            <p class="card-text text-capitalize">Owner:{{ $c->owners->name }}</p>
                            <a href="car/{{ $c->id }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <h5 class="card-title text-capitalize text-center">No Data Available!</h5>
            @endforelse


        </div>
    </div>
@endsection
