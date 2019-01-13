@extends('layouts.app')

@section('content')

    <div class="view">
        <div class="col-12">
            <div class="row">
                <h1 class="mx-auto mt-4">Sold</h1>
            </div>
        </div>

        <hr class="mb-5">
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-6 mx-auto mt-5">
                <a href="/sold-prints">
                    <div class="card shadow-sm text-center py-5 text-dark">
                        <h3 class="m-5">
                            <i class="fas fa-fingerprint"></i>
                            Prints
                        </h3>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mx-auto my-5">
                <a href="/sold-paintings">
                    <div class="card shadow-sm text-center py-5 text-dark">
                        <h3 class="m-5">
                            <i class="fas fa-palette"></i>
                            Paintings
                        </h3>
                    </div>
                </a>
            </div>

        </div>
    </div>


@endsection