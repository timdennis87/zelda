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
            Edit Print
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
            <form method="post" action="{{ route('printings.update', $printing->id) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text"
                           id="title"
                           class="form-control"
                           name="title"
                           value="{{ $printing->title }}"/>
                </div>

                <div class="form-group">
                    <label for="year">Year :</label>
                    <input type="text"
                           id="year"
                           class="form-control"
                           name="year"
                           value="{{ $printing->year }}"/>
                </div>

                <div class="form-group">
                    <label for="size">Size :</label>
                    <input type="text"
                           id="size"
                           class="form-control"
                           name="size"
                           value="{{ $printing->size }}"/>
                </div>

                <div class="form-group">
                    <label for="details">Details :</label>
                    <textarea class="form-control summernote"
                              id="details"
                              name="details"
                              rows="5">{{ $printing->details }}</textarea>
                </div>

                <div>
                    <label for="is_sold">Sold :</label>
                    <input {{ $printing['is_sold'] && $printing['is_sold'] == 1 ? 'checked' : '' }}
                           id="is_sold"
                           value="1"
                           type="checkbox"
                           name="is_sold"
                    >
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
        </div>
    </div>
@endsection