@extends('admin.layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body pt-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>
                        <a href="/admin/messages">
                            <i class="far fa-envelope mr-2"></i>
                            You have {{ $unreadMessages }} unread messages!
                        </a>
                    </h4>

                </div>
            </div>
        </div>
    </div>
@endsection
