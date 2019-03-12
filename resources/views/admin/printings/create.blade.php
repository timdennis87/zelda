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

    <a href="{{ url('admin/printings') }}"
       class="btn btn-info mb-2">
        Back
    </a>

    <div class="card uper">
        <div class="card-header">
            Add Print
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
                  action="{{ route('printings.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" name="title"/>
                </div>

                <div class="form-group">
                    <label for="year">Year :</label>
                    <input type="text" class="form-control" name="year"/>
                </div>

                <div class="form-group">
                    <label for="size">Size :</label>
                    <input type="text" class="form-control" name="size"/>
                </div>

                <div class="form-group">
                    <label for="details">Details :</label>
                    <textarea class="form-control summernote"
                              name="details"
                              rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="img">Image :</label>
                    <input type="file" class="" name="img"/>
                </div>

                <button type="submit" class="btn btn-success btn-lg">Add</button>

            </form>

        </div>
    </div>
@endsection