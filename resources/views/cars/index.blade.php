@extends('layouts.app')
@section('content')
    <!-- container starts -->
    <div class="container-fluid my-5">
        <!-- card starts -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="text-dark fw-bold">Cars</h3>
                <div>
                    <button type="button" class="btn gradient-custom-3" data-bs-toggle="modal" data-bs-target="#carModal">
                        Add Cars +
                    </button>
                </div>
            </div>
            <!--card body starts -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle py-3 text-center" id="room_table"
                        style="width:100%;white-space:nowrap;" data-paging="true" data-searching="true"
                        data-ordering="false" data-info="false">
                        <thead>
                            <tr>
                                <th class="text-start">Car Name</th>
                                <th class="text-center">Car Type</th>
                                <th class="text-center">Car Price</th>
                                <th class="text-center">Top Speed</th>
                                {{-- <th class="text-center">Room Status</th>
                                <th class="text-center">Remarks</th> --}}
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($cars as $car)
                                <tr>
                                    <td class="text-start">{{ $car->name }}</td>
                                    <td>{{ $car->car_type->type }}</td>
                                    <td>{{ $car->price }}</td>
                                    <td>{{ $car->speed }}</td>
                                    {{-- <td class="text-success fw-bold">Active</span></td>
                                <td>this is demo description</td> --}}
                                    <td class="text-end">
                                        <a class="btn btn-sm" href="/car/{{ $car->id }}">
                                            <span class=" fa fa-eye"></span>
                                        </a>
                                        {{-- <a class="btn btn-sm">
                                            <span class=" fa fa-pen"></span>
                                        </a>
                                        <a class="btn btn-sm">
                                            <span class=" fa fa-trash"></span>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <!--card body ends -->
        </div>
        <!-- card ends -->
        <!-- Modal -->
        <div class="modal fade" id="carModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-purple text-center mb-4 mt-0">Add Car Details</h3>
                        <form action="/car" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- col start -->
                                <div class="col-md-6 col-12 mb-3">
                                    <label class=" fw-bold mb-1 ">Car Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" />
                                </div>
                                <!-- col start -->

                                <div class="col-md-6 col-12 mb-3">
                                    <label class=" fw-bold mb-1 ">Car Type:</label>
                                    <select id="" class="form-select" name="type">
                                        <option disabled selected>Status...</option>
                                        @foreach ($type as $t)
                                            <option value="{{ $t->id }}">{{ $t->type . '-' . $t->speed }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- col start -->
                                <div class="col-md-6 col-12 mb-3">
                                    <label class=" fw-bold mb-1 ">Car Price:</label>
                                    <input type="number" class="form-control" name="price" id="price" />
                                </div>
                                <!-- col start -->
                                <div class="col-md-6 col-12 mb-3">
                                    <label class=" fw-bold mb-1 ">Top Speed:</label>
                                    <input type="text" class="form-control" name="speed" id="speed" />
                                </div>
                                <!-- col start -->
                                <div class="col-12 mb-3">
                                    <label class=" fw-bold mb-1 ">Car Images:</label>
                                    <input type="file" multiple class="form-control" name="image[]" id="image" />
                                </div>
                                <!-- col start -->

                            </div>
                    </div>
                    <div class="mt-3 mb-5 text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark ">Save</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
    <!-- container ends -->
@endsection
