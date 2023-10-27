@extends('layouts.app')
@section('content')
    <section class="h-100 gradient-custom">
        {{-- <div class="container py-5 h-100"> --}}
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">
                        <h5 class="text-muted mb-0"> <span style="color: #a8729a;">Car Details</span>!</h5>
                    </div>
                    <div class="card-body p-4">

                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">

                                    @foreach ($car->car_images as $image)
                                        <div class="col-md-2">
                                            <img src="{{ Storage::url($image->image) }}" class="img-fluid" alt="car">
                                        </div>
                                    @endforeach


                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <p class="fw-bold mb-0">Name : {{ $car->name }}</p>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <p class="text-muted mb-0">Type : {{ $car->car_type->type }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <p class="text-muted mb-0">Price : {{ $car->price }}</p>
                        </div>

                        <div class="d-flex justify-content-between mb-5">
                            <p class="text-muted mb-0">Speed : {{ $car->speed }}</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>
@endsection
