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

    <a href="{{ url('admin/paintings') }}"
       class="btn btn-info mb-2">
        Back
    </a>

    <div class="card uper">
        <div class="card-header">
            Edit Painting
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
            <form method="post" action="{{ route('paintings.update', $painting->id) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text"
                           id="title"
                           class="form-control"
                           name="title"
                           value="{{ $painting->title }}"/>
                </div>

                <div class="form-group">
                    <label for="year">Year :</label>
                    <input type="text"
                           id="year"
                           class="form-control"
                           name="year"
                           value="{{ $painting->year }}"/>
                </div>

                <div class="form-group">
                    <label for="size">Size :</label>
                    <input type="text"
                           id="size"
                           class="form-control"
                           name="size"
                           value="{{ $painting->size }}"/>
                </div>

                <div class="form-group">
                    <label for="details">Details :</label>
                    <textarea class="form-control summernote"
                              name="details"
                              id="details"
                              rows="5">{{ $painting->details }}</textarea>
                </div>

                <div>
                    <label for="is_sold">Archive :</label>
                    <input type="hidden" value="0" name="is_sold">
                    <input {{isset($painting['is_sold'])&&$painting['is_sold']=='Yes' ? 'checked' : ''}}
                           id="is_sold"
                           value="Yes"
                           type="checkbox"
                           name="is_sold"
                    >
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
        </div>
    </div>
@endsection