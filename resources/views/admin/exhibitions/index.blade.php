@extends('admin.layouts.app')

@section('content')

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <div class="text-center">
            <h1 class="mb-3">Exhibitions</h1>
        </div>

        <a href="exhibitions/create"
           class="btn btn-success">
            Add Exhibition</a>


            <table class="table table-striped mt-3">
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th width="150px">Address</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th width="110px">Action</th>
                </tr>
                @foreach ($exhibitions as $exhibition)
                    <tr>
                        <td>{{ $exhibition->title }}</td>
                        <td>{{ $exhibition->date }}</td>
                        <td>{{ $exhibition->time }}</td>
                        <td>{{ $exhibition->venue }}</td>
                        <td>{!! strip_tags($exhibition->address) !!}</td>
                        <td>{!! strip_tags($exhibition->details) !!}</td>
                        <td>
                            <img src="{{asset('images/').'/'. $exhibition->img }}" width="35px">
                        </td>
                        <td>
                            <form action="{{ route('exhibitions.destroy',$exhibition->id) }}" method="POST">

                                <a class="btn btn-primary"
                                   href="{{ route('exhibitions.edit',$exhibition->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        <div>
@endsection