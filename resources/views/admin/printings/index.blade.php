@extends('admin.layouts.app')

@section('content')

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="text-center">
        <h1 class="mb-3">Prints</h1>
    </div>

    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        @if(auth()->user()->role == 0)
            <a href="printings/create"
               class="btn btn-success">
                Add Print
            </a>
        @endif


            <table class="table table-striped mt-3">
                <tr>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Size</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th class="text-center">Sold</th>
                    <th width="110px">Action</th>
                </tr>
                @foreach ($printings as $printing)
                    <tr>
                        <td>{{ $printing->title }}</td>
                        <td>{{ $printing->year }}</td>
                        <td>{{ $printing->size }}</td>
                        <td>{!! strip_tags($printing->details) !!}</td>
                        <td>
                            <img src="{{asset('images/').'/'. $printing->img }}" width="35px">
                        </td>
                        <td class="text-center">
                            @if($printing->is_sold == '0')
                                <i class="text-success fas fa-check"></i>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->role == 0)
                                <form action="{{ route('printings.destroy',$printing->id) }}" method="POST">

                                    <a class="btn btn-primary"
                                       href="{{ route('printings.edit',$printing->id) }}">
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