@extends('layouts.app')

@section('content')

    <div class="view">
        <div class="col-12">
            <div class="row">
                <h1 class="mx-auto mt-4">Paintings Archive</h1>
            </div>
        </div>

        <hr class="mb-5">
    </div>

    <div class="container">
        <a href="{{ url('/archive') }}"
           class="btn btn-info mb-5">
            <i class="fas fa-chevron-left"></i>
            Back To Archive Page
        </a>
        <div class="row">

            @foreach($paintings as $painting)
                <div class="col-md-3 my-3">
                    <div class="card shadow-sm">
                        <img class="mx-auto d-block shadow-sm p-3 bg-white rounded"
                             src="{{ asset('images/').'/'. $painting->img }}" width="100%"
                        >
                        <div class="card-footer text-center">
                            {{ $painting->title }}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection