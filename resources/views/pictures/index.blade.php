@extends('layouts.app')

@push('scripts')
    <script src="/assets/js/pictures-a.js"></script>
    @if (Auth::user() && Auth::user()->can('edit-picture'))
        <script src="/assets/js/pictures-b.js"></script>
    @endif

@endpush

@section('content')
    <div class="container" id="pictures">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Pictures</span>
                        @if (Auth::user() && Auth::user()->can('create-picture'))
                            <button class="btn btn-primary btn-xs modal-action" style="float: right;" href="{{ url('picture/new') }}">Create New</button>
                        @endif
                    </div>

                    <div class="panel-body">
                        @foreach ($pictures as $picture)
                            <div class="col-md-3">
                                <a href="{{ url('picture/'.$picture->id) }}" class="thumbnail modal-action">
                                    <p class="text-center">{{ $picture->title }}</p>
                                    <img src="{{ $picture->min }}" alt="{{ $picture->title }}">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="panel-footer text-center">{!! $pictures->render() !!}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-container"></div>

@endsection
