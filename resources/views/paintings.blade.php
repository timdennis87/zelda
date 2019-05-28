@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">Paintings</h1>
        </div>
    </div>

    <hr class="mb-5">

    <div class="container">
        <div class="row">

            @foreach($paintings as $painting)
                <div class="col-md-3 my-3">
                    <div class="card shadow-sm">
                        <a href="/show-painting/{{ $painting->id }}">
                            <img class="mx-auto d-block shadow-sm p-3 bg-white rounded"
                                 src="{{ asset('images/').'/'. $painting->img }}" width="100%"
                            >
                        </a>
                        {{--<div class="card-footer text-center">--}}
                            {{--{{ $painting->title }}--}}
                        {{--</div>--}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection