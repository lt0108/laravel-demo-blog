@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">文章列表</div>

                <div class="card-body">
                    <ul>
                        @foreach ($articles as $article)
                        <li style="">
                            <div class="title">
                                <a href="{{ url('article/'.$article->id) }}"><h4>{{ $article->title }}</h4></a>
                            </div>
                            <div class="body">
                                <p>{{ $article->body }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
