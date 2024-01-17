@extends('finance::layouts.master')
@section('content')
    <div class="container">

        <!-- Create Company -->
        @auth('web')
            <form method="GET" action="{{route('companies.create')}}">
                <button class="btn btn-dark ms-3"> Create Company</button>
            </form>
        @endauth

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
