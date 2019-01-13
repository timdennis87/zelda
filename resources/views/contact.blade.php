@extends('layouts.app')

@section('content')

    <div class="col-12">
        <div class="row">
            <h1 class="mx-auto mt-4">Contact</h1>
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

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

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

            <div class="form-group">
                {{ csrf_field() }}
                <label for="subject">Subject *</label>
                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}"/>
            </div>

            <div class="form-group">
                {{ csrf_field() }}
                <label for="message">Message *</label>
                <textarea class="form-control" name="message" rows="5">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success btn-lg">Send Message</button>
        </form>
        <div class="text-danger mt-2">* Required fields</div>
    </div>

@stop