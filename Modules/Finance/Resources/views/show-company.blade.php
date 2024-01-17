@extends('finance::layouts.master')
@section('content')

    <div class="container ms-auto">
        <div class="card-body">

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                <!-- Name -->
                <div class="col-md-6">
                    <pre id="name" class="form-control">{{$company->name}}</pre>
                </div>
            </div>

            <!-- Address -->
            <div class="row mb-3">
                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                <!-- Address -->
                <div class="col-md-6">
                    <pre id="address" type="text" class="form-control">{{$company->address}}</pre>
                </div>
            </div>

            <!-- Logo -->
            <div class="row mb-3">
                <label for="logo" class="col-md-4 col-form-label text-md-end">Logo</label>
                <div class="col-md-6">
                    <img type="file" id="logo" class="form-control" src="{{$company->logo}}" alt="">
                </div>
            </div>

            <!-- Description -->
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                <div class="col-md-6">
                    <pre id="description" class="form-control">{{$company->description}}</pre>
                </div>
            </div>

        </div>
    </div>
@endsection
