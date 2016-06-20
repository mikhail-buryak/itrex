@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pictures</div>

                <div class="panel-body">
                    @foreach ($pictures as $picture)
                        <div class="col-md-4">
                            <a href="{{ url('picture/'.$picture->id) }}" class="thumbnail">
                                <p class="text-center">{{ $picture->title }}</p>
                                <img src="{{ $picture->min }}" alt="{{ $picture->title }}" style="width:150px;height:150px">
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="panel-footer text-center">{!! $pictures->render() !!}</div>
            </div>
        </div>
    </div>
</div>

@endsection
