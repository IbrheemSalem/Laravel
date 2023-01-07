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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">{{__("messges.Create Offer")}}</a>
                </div>
            </nav>
            @if(Session::has('success'))
                <div class="alert alert-success container" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif
        </div>

        <div class="container">
            <form method="POST" action="{{ route('offers.update',$offer->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputname" class="form-label" >{{__('messges.Name Offer')}}</label>
                    <input type="text" class="form-control" name="name_en" value="{{$offer->name_en}}" id="exampleInputname" placeholder="{{__('messges.Name Offer')}}" aria-describedby="emailHelp">
                    @error('name')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputArabic" class="form-label" >{{__('messges.Name Arabic')}}</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar}}" id="exampleInputArabic" placeholder="{{__('messges.Name Arabic')}}" aria-describedby="emailHelp">
                    @error('name_Arabic')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPrice" class="form-label">{{__('messges.Price Offer')}}</label>
                    <input type="number" class="form-control" name="price" value="{{$offer->price}}" placeholder="{{__('messges.Price Offer')}}" id="exampleInputPrice" >
                    @error('price')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhoto" class="form-label">{{__('messges.photo Offer')}}</label>
                    <input type="text" class="form-control" name="photo" value="{{$offer->photo}}"  placeholder="{{__('messges.photo Offer')}}" id="exampleInputPhoto">
                    @error('photo')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{__('messges.Submit')}}</button>
            </form>
        </div>
@endsection
