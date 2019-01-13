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
            Edit About Me Section
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('about-me.update', $information->id) }}">
                @method('PATCH')
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="info">About :</label>
                    <textarea class="form-control summernote" name="info" rows="10">
                        {!! nl2br(e($information->info)) !!}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
        </div>
    </div>
@endsection