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
            <h1 class="mb-3">About Me</h1>
        </div>

        @if(auth()->user()->role == 0)
            <a href="about-me/create"
               class="btn btn-success">
                Add About Me Information
            </a>
        @endif

        <table class="table table-striped mt-3">
            <tr>
                <th>About</th>
                <th width="200px">Image</th>
                <th width="110px">Action</th>
            </tr>
            @foreach ($information as $info)
                <tr>
                    <td>{!! strip_tags($info->info) !!}</td>
                    <td>
                        <img src="{{asset('images/').'/'. $info->img }}" width="150px">
                    </td>
                    <td>
                        @if(auth()->user()->role == 0)
                            <form action="{{ route('about-me.destroy',$info->id) }}" method="POST">

                                <a class="btn btn-primary"
                                   href="{{ route('about-me.edit',$info->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
@endsection