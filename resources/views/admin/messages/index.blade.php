@extends('admin.layouts.app')

@section('content')

    <div class="text-center">
        <h1 class="mb-5">Messages</h1>
    </div>

    @foreach($messages as $message)
        <a href="messages/show/{{ $message->id }}">
            <div @if($message->is_read)
                    class="alert alert-primary shadow"
                 @else
                    class="alert alert-light shadow-sm"
                 @endif
                 role="alert">
                <div class="row">
                    <div class="col-sm-2">
                        <i class="fas fa-user-circle"></i>
                        {{ $message->name }}
                    </div>
                    <div class="col-sm-8">
                        <strong>{{ $message->subject }}</strong>
                    </div>
                    <div class="col-sm-2">
                        {{ $message->created_at->format('M d y | H:i') }}
                        @if($message->is_read)
                            <i class="far fa-eye-slash ml-3"></i>
                        @else
                            <i class="far fa-eye ml-3"></i>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    @endforeach

@stop