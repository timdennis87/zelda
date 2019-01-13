@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">About Me</h1>
        </div>
    </div>

    <hr class="mb-5">

    @foreach($information as $info)
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img class="mx-auto d-block mb-3 shadow-sm p-3 mb-5 bg-white rounded" src="{{asset('images/').'/'. $info->img }}" width="100%">
                </div>
                <div class="col-sm-12 col-md-8 mb-3">
                    <p>{!! $info->info !!} </p>
                    Visit my page at Open Studios -
                    <a href="https://www.nnopenstudios.org.uk/artists/details/1363">
                        nnopenstudios.org.uk
                    </a>
                </div>
            </div>
        </div>
    @endforeach

@endsection