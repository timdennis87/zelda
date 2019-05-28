@extends('layouts.app')

@section('content')

    <div class="view">
        <div class="col-12">
            <div class="row">
                <h1 class="mx-auto mt-4">Welcome.</h1>
            </div>
        </div>

        <hr class="mb-5">
    </div>

    <div class="container">

        <div class="col-md-12">
            <div class="row my-3 text-center">
                <div class="col-md-6">
                    <h3 class="">My latest prints</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('/prints') }}"
                       class="btn btn-info">
                        Go to Prints
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            @foreach($prints as $print)
                <div class="col-md-6">
                    <div class="card shadow-sm my-2">
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

        <hr>
        <div class="col-md-12">
            <div class="row my-3 text-center">
                <div class="col-md-6">
                    <h3 class="">My latest paintings</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('/paintings') }}"
                       class="btn btn-info">
                        Go to Paintings
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            @foreach($paintings as $painting)
                <div class="col-md-6">
                    <div class="card shadow-sm my-2">
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

        {{--<hr>--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="row my-3 text-center">--}}
                {{--<div class="col-md-6">--}}
                    {{--<h3 class="">Exhibition Update</h3>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<a href="{{ url('/exhibitions') }}"--}}
                       {{--class="btn btn-info">--}}
                        {{--Go to Exhibitions--}}
                        {{--<i class="fas fa-chevron-right"></i>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<hr>--}}

        {{--<div class="row">--}}
            {{--@foreach($exhibitions as $exhibition)--}}
                {{--<div class="col-sm-12 col-md-6">--}}
                    {{--<img class="mx-auto d-block mb-3 shadow-sm p-3 mb-5 bg-white rounded"--}}
                         {{--src="{{ asset('images/').'/'. $exhibition->img }}" width="100%">--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 col-md-6 mb-3">--}}
                    {{--<p><strong>Title: </strong><br>{{ $exhibition->title }}</p>--}}
                    {{--<p><strong>Date: </strong><br>{{ $exhibition->date }}</p>--}}
                    {{--<p><strong>Time: </strong><br>{{ $exhibition->time }}</p>--}}
                    {{--<p><strong>Venue: </strong><br>{{ $exhibition->venue }}</p>--}}
                    {{--<p><strong>Address: </strong>--}}
                        {{--{!! preg_replace( "/\r|\n/", "", $exhibition->address) !!}--}}
                    {{--</p>--}}
                    {{--@if($exhibition->details != '')--}}
                        {{--<p><strong>Details: </strong>--}}
                            {{--{!! preg_replace( "/\r|\n/", "", $exhibition->details) !!}--}}
                        {{--</p>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}

    </div>


@endsection