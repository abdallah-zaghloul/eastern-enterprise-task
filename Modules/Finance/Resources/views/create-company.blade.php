@extends('finance::layouts.master')
@section('content')

    <div class="container ms-auto">
        <div class="card-body">

            <!-- Success -->
            @if(session('success'))
                <div class="col-md-4 offset-md-4 alert alert-success text-center" role="alert">
                    {{ session('success') }}
                    @php(session()->remove('success'))
                </div>
            @endif

            <!-- Back Form -->
            <form method="GET" action="{{route('finance')}}">

                <div class="row mb-3">
                    <div class="col-md-4 offset-md-4">
                        <button type="submit" class="btn btn-danger">
                            Back
                        </button>
                    </div>
                </div>

            </form>

            <!-- Product Form -->
            <form method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                    <!-- Name -->
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                    <!-- Address -->
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                               name="address"
                               value="{{ old('address') }}" required autocomplete="address" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                        @enderror
                    </div>
                </div>

                <!-- Logo -->
                <div class="row mb-3">
                    <label for="logo" class="col-md-4 col-form-label text-md-end">Logo</label>

                    <div class="col-md-6">
                        <input type="file" id="logo" class="form-control @error('logo') is-invalid @enderror"
                               name="logo"
                               value="{{ old('logo') }}">

                        @error('logo')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                        @enderror
                    </div>

                </div>

                <!-- Description -->
                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                    <div class="col-md-6">
                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                          name="description"
                          autocomplete="description">
                    {{ old('description') }}
                </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-0 ">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
