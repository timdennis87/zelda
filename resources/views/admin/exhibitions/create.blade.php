@extends('admin.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="text-center">
        <h1 class="mb-3">Exhibitions</h1>
    </div>

    <a href="{{ url('admin/exhibitions') }}"
       class="btn btn-info mb-2">
        Back
    </a>

    <div class="card uper">
        <div class="card-header">
            Add Exhibition
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            <form method="post"
                  enctype="multipart/form-data"
                  action="{{ route('exhibitions.store') }}">

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" name="title"/>
                </div>

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="date">Date :</label>
                    <input type="text" class="form-control" name="date"/>
                </div>

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="time">Time :</label>
                    <input type="text" class="form-control" name="time"/>
                </div>

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="venue">Venue :</label>
                    <input type="text" class="form-control" name="venue"/>
                </div>

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="address">Address :</label>
                    <textarea class="form-control summernote" name="address" rows="5"></textarea>
                    {{--<input type="text" class="form-control" name="address"/>--}}
                </div>

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="details">Information :</label>
                    <textarea class="form-control summernote" name="details" rows="5"></textarea>
                    {{--<input type="text" class="form-control" name="address"/>--}}
                </div>

                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="img">Image :</label>
                    <input type="file" class="" name="img"/>
                </div>

                <button type="submit" class="btn btn-success btn-lg">Add</button>
            </form>

        </div>
    </div>
@endsection