@extends('finance::layouts.master')
@section('content')
    <div class="container">


        <div class="row justify-content-center">

            <div class="card-body">
                <!-- Success -->
                @if(session('success'))
                    <div class="col-md-4 offset-md-4 alert alert-success text-center" role="alert">
                        {{ session('success') }}
                        @php(session()->remove('success'))
                    </div>
                @endif
            </div>

            <!-- Companies Component -->
            @livewire('finance::companies')

        </div>

    </div>
@endsection
