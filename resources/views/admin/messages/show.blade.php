@extends('admin.layouts.app')

@section('content')

    <div class="text-center">
        <h1 class="mb-3">Messages</h1>
    </div>

    <form method="post" action="/admin/messages/show/{{ $message->id }}">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success mb-3">Update/Back</button>
        <div>
            <label for="is_read">Read Message :</label>
            <input {{ $message['is_read'] && $message['is_read'] == 1 ? 'checked' : 'checked' }}
                   id="is_read"
                   value="1"
                   type="checkbox"
                   name="is_read"
            >
        </div>
    </form>

    <div class="alert alert-light shadow-sm mt-3" role="alert">
        <h2 class="alert-heading">{{ $message->subject }}</h2>
        <hr>
        <span class="mr-2">From: </span><strong>{{ $message->name }}</strong><br>
        <span class="mr-2">Email: </span> {{ $message->email }}<br>
        @if($message->phone)
            <span class="mr-2">Phone: </span> {{ $message->phone }}<br>
        @endif
        <span class="mr-2">Date: </span> {{ $message->created_at->format('M d Y | H:i') }}
        <hr>
        <p class="mb-0">{{ $message->message }}</p>
    </div>

@stop
