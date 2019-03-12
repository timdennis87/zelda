@extends('admin.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="text-center">
        <h1 class="mb-3">About Me</h1>
    </div>

    <a href="{{ url('admin/about-me') }}"
       class="btn btn-info mb-2">
        Back
    </a>

    <div class="card uper">
        <div class="card-header">
            Add About Me Section
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
                  action="{{ route('about-me.store') }}">
                @csrf

                <div class="form-group">
                    <label for="info">About :</label>
                    <textarea class="form-control summernote"
                              id="info"
                              name="info"
                              rows="20"></textarea>
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