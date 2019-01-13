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
            Edit Exhibition
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
            <form method="post" action="{{ route('exhibitions.update', $exhibition->id) }}">
                @method('PATCH')
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           value={{ $exhibition->title }} />
                </div>

                <div class="form-group">
                    <label for="date">Date :</label>
                    <input type="text"
                           class="form-control"
                           name="date"
                           value={{ $exhibition->date }} />
                </div>

                <div class="form-group">
                    <label for="time">Time :</label>
                    <input type="text"
                           class="form-control"
                           name="time"
                           value={{ $exhibition->time }} />
                </div>

                <div class="form-group">
                    <label for="venue">Venue :</label>
                    <input type="text"
                           class="form-control"
                           name="venue"
                           value={{ $exhibition->venue }} />
                </div>

                <div class="form-group">
                    <label for="address">Address :</label>
                    <textarea class="form-control summernote" name="address" rows="5">
                        {{ $exhibition->address }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="details">Information :</label>
                    <textarea class="form-control summernote" name="details" rows="5">
                        {{ $exhibition->details }}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
        </div>
    </div>
@endsection