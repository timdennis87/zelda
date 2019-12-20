@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">{{ $print->title }}</h1>
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
                    <a href="{{ URL::to( 'show-print/' . $previous->id ) }}">
                        <button type="button" class="btn btn-info">
                            <i class="fas fa-chevron-left"></i>
                            Previous
                        </button>
                    </a>
                @endif
            </div>
            <div class="col text-right">
                @if($next)
                    <a href="{{ URL::to( 'show-print/' . $next->id ) }}">
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
                <img class="pointer mx-auto d-block mb-3 shadow-sm p-3 mb-5 bg-white rounded"
                     src="{{ asset('images/').'/'. $print->img }}"
                     width="100%"
                     data-toggle="modal"
                     data-target=".bd-example-modal-lg"
                >
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <p><strong>Title: </strong><br>{{ $print->title }}</p>
                <p><strong>Size: </strong><br>{{ $print->size }}</p>
                <p><strong>Price: </strong><br>Please fill out the contact form below.</p>

            @if($print->details != '')
                    <p><strong>Details: </strong>
                        {!! preg_replace( "/\r|\n/", "", $print->details) !!}
                    </p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">{{ $print->title }}</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="mx-auto d-blockshadow-sm p-3 bg-white rounded"
                         src="{{ asset('images/').'/'. $print->img }}"
                         width="100%"
                    >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
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

        <h4>For enquires on this print</h4>

        <form method="post"
          action="{{ route('contact.index') }}">

            <div class="form-group">
                {{ csrf_field() }}
                <label for="name">Name *</label>
                <input type="text"
                       id="name"
                       class="form-control"
                       name="name"
                       value="{{ old('name') }}"/>
            </div>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="email">Email *</label>
                <input type="email"
                       id="email"
                       class="form-control"
                       name="email"
                       value="{{ old('email') }}"/>
            </div>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="phone">Phone Number</label>
                <input type="tel"
                       id="phone"
                       class="form-control"
                       name="phone"
                       value="{{ old('phone') }}"/>
            </div>

            {{ csrf_field() }}
            <input type="hidden"
                   name="subject"
                   value="Print : {{ $print->title }}"/>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="message">Message *</label>
                <textarea class="form-control"
                          id="message"
                          name="message"
                          rows="5">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success btn-lg">Send Message</button>
        </form>
        <div class="text-danger mt-2">* Required fields</div>
    </div>

@endsection