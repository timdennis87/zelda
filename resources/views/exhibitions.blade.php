@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">Exhibitions</h1>
        </div>
    </div>

    <hr class="mb-5">

    @foreach($exhibitions as $exhibition)
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <img class="mx-auto d-block mb-3 shadow-sm p-3 mb-5 bg-white rounded"
                         src="{{ asset('images/').'/'. $exhibition->img }}" width="100%">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <p><strong>Title: </strong><br>{{ $exhibition->title }}</p>
                    <p><strong>Date: </strong><br>{{ $exhibition->date }}</p>
                    <p><strong>Time: </strong><br>{{ $exhibition->time }}</p>
                    <p><strong>Venue: </strong><br>{{ $exhibition->venue }}</p>
                    <p><strong>Address: </strong>
                        {!! preg_replace( "/\r|\n/", "", $exhibition->address) !!}
                    </p>
                    @if($exhibition->details != '')
                        <p><strong>Details: </strong>
                            {!! preg_replace( "/\r|\n/", "", $exhibition->details) !!}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <hr class="mb-5">
    @endforeach

@endsection