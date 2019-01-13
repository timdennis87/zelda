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
                @method('PATCH')
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           value={{ $printing->title }} />
                </div>

                <div class="form-group">
                    <label for="year">Year :</label>
                    <input type="text"
                           class="form-control"
                           name="year"
                           value={{ $printing->year }} />
                </div>

                <div class="form-group">
                    <label for="size">Size :</label>
                    <input type="text"
                           class="form-control"
                           name="size"
                           value={{ $printing->size }} />
                </div>

                <div class="form-group">
                    <label for="details">Information :</label>
                    <textarea class="form-control summernote" name="details" rows="5">
                        {{ $printing->details }}
                    </textarea>
                </div>

                <div>
                    <label for="is_sold">Sold :</label>
                    <input type="hidden" value="0" name="is_sold">
                    <input {{isset($printing['is_sold'])&&$printing['is_sold']=='Yes' ? 'checked' : ''}}
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