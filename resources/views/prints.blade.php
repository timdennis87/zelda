@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">Prints</h1>
        </div>
    </div>

    <hr class="mb-5">

    <div class="container">
        <div class="row">

            @foreach($printings as $print)
                <div class="col-md-3 my-3">
                    <div class="card shadow-sm">
                        <a href="/show-print/{{ $print->id }}">
                            <img class="mx-auto d-block shadow-sm p-3 bg-white rounded"
                                 src="{{ asset('images/').'/'. $print->img }}" width="100%"
                            >
                        </a>
                        {{--<div class="card-footer text-center">--}}
                            {{--{{ $print->title }}--}}
                        {{--</div>--}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection