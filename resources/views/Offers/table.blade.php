@extends('layouts.app')
@section('content')

        <div class="container">
            @if(Session::has('success'))
                <div class="alert alert-success container" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
            @if(Session::has('erroe'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('erroe')}}
                </div>
            @endif
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item">
                                <a class="nav-link active" rel="alternate" hreflang="{{ $localeCode }}" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div>
                            <form class="d-flex ">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>

                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Table Of Data</a>
                </div>
            </nav>
        </div>
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('messges.Name Offer')}}</th>
                        <th scope="col">{{__('messges.Price Offer')}}</th>
                        <th scope="col">{{__('messges.Photo Offer')}}</th>
                        <th scope="col">{{__('messges.Details Offer')}}</th>
                        <th scope="col">{{__('messges.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Offers as $offer)
                            <tr>
                                <th scope="row">{{ $offer->id }}</th>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->price }}</td>
                                <td><img src="\images\offers\{{ $offer->photo }}" style="width:50px"></td>
                                <td>{{ $offer->details }}</td>
                                <td><a href="{{ route('offers.edit',$offer->id)}}" class="btn btn-success">{{__('messges.Up Date')}}</a></td>
                                <td><a href="{{ route('offers.delete',$offer->id)}}" class="btn btn-danger">{{__('messges.Delete')}}</a></td>
                            </tr>
                        @endforeach

                    <tr>
                    </tbody>
            </table>
        </div>
        {{-- {!! $Offers->links() !!} --}}
        <div class="d-flex justify-content-center">
            {!! $Offers->links() !!}
        </div>
@endsection
