@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">{{ $painting->title }}</h1>
        </div>
    </div>

    <hr class="mb-5">

    <div class="container">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row mb-5">
            <div class="col text-left">
                @if($previous)
                    <a href="{{ URL::to( 'show-painting/' . $previous->id ) }}">
                        <button type="button" class="btn btn-info">
                            <i class="fas fa-chevron-left"></i>
                            Previous
                        </button>
                    </a>
                @endif
            </div>
            <div class="col text-right">
                @if($next)
                    <a href="{{ URL::to( 'show-painting/' . $next->id ) }}">
                        <button type="button" class="btn btn-info">
                            Next
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img class="mx-auto d-block mb-3 shadow-sm p-3 mb-5 bg-white rounded"
                     src="{{ asset('images/').'/'. $painting->img }}" width="100%">
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <h4><strong>Title: </strong><br>{{ $painting->title }}</h4>
                <h4><strong>Year: </strong><br>{{ $painting->year }}</h4>
                <h4><strong>Size: </strong><br>{{ $painting->size }}</h4>
                <h4><strong>Price: </strong><br>Please fill out the contact form below.</h4>

                @if($painting->details != '')
                    <h4><strong>Details: </strong>
                        {!! preg_replace( "/\r|\n/", "", $painting->details) !!}
                    </h4>
                @endif
            </div>
        </div>
    </div>

    <hr class="mb-5">

    <div class="container mb-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        <h4>For enquires on this painting</h4>

        <form method="post"
              action="{{ route('contact.index') }}">

            <div class="form-group">
                {{ csrf_field() }}
                <label for="name">Name *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
            </div>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="email">Email *</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"/>
            </div>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}"/>
            </div>

            {{ csrf_field() }}
            <input type="hidden" name="subject" value="Painting : {{ $painting->title }}"/>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="message">Message *</label>
                <textarea class="form-control" name="message" rows="5">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success btn-lg">Send Message</button>
        </form>
        <div class="text-danger mt-2">* Required fields</div>
    </div>

@endsection