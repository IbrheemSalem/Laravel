@extends('layouts.app')
@section('content')

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item">
                                <a class="nav-link active" rel="alternate" hreflang="{{ $localeCode }}" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class=" navbar-light bg-light ">
                <h1 class="d-flex justify-content-center">Views ({{ $video->viewers }})</h1>
                <div class="container-fluid d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </nav>
@endsection
