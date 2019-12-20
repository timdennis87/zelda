@extends('admin.layouts.app')

@section('content')

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="text-center">
        <h1 class="mb-3">Paintings</h1>
    </div>

    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        @if(auth()->user()->role == 0)
            <a href="paintings/create"
               class="btn btn-success">
                Add Painting
            </a>
        @endif


            <table class="table table-sm mt-3">
                <tr class="font-weight-bold">
                    <th>Title</th>
                    <th>Year</th>
                    <th>Size</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th class="text-center">Sold</th>
                    <th class="text-center" width="110px">Action</th>
                </tr>
                @foreach ($paintings as $painting)
                    <tr>
                        <td>{{ $painting->title }}</td>
                        <td>{{ $painting->year }}</td>
                        <td>{{ $painting->size }}</td>
                        <td>{!! strip_tags($painting->details) !!}</td>
                        <td>
                            <img src="{{asset('images/').'/'. $painting->img }}" width="35px">
                        </td>
                        <td class="text-center">
                            @if($painting->is_sold == 1)
                                <i class="text-success fas fa-check"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(auth()->user()->role == 0)
                                <form action="{{ route('paintings.destroy',$painting->id) }}" method="POST">

                                    <a class="btn btn-primary"
                                       href="{{ route('paintings.edit',$painting->id) }}">
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