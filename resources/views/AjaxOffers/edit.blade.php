@extends('AjaxOffers/layout.masters')
@section('content')
        <div class="container">
            <div class="alert alert-success" id="success_msg"  style="display:none"role="alert">
                {{__('messges.Done save successfuly')}}
            </div>
        </div>
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
        </div>
        <div class="container">
            <form method="" action="" id="UpdateOfferForm" enctype="multipart/form-data" >
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
                    <input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar}}"  id="exampleInputArabic" placeholder="{{__('messges.Name Arabic')}}" aria-describedby="emailHelp">
                    @error('name_Arabic')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPrice" class="form-label">{{__('messges.Price Offer')}}</label>
                    <input type="number" class="form-control" name="price"  value="{{$offer->price}}"  placeholder="{{__('messges.Price Offer')}}" id="exampleInputPrice" >
                    @error('price')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputdetails" class="form-label">{{__('messges.Details Offer')}}</label>
                    <input type="text" class="form-control" name="details"  value="{{$offer->details}}" placeholder="{{__('messges.Details Offer')}}" id="exampleInputdetails">
                    @error('details')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhoto" class="form-label">{{__('messges.photo Offer')}} : <img src="/images/offers/{{$offer->photo}}" alt="Not Img" style="width:50px"></label>
                    <input type="file" class="form-control" name="photo" value="" placeholder="{{__('messges.photo Offer')}}" id="exampleInputPhoto">
                    @error('photo')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="id_edit" value="{{$offer->id}}"> <!--send Id use controller -->
                <button type="submit" id="Update_offer" class="btn btn-primary">{{__('messges.Submit')}}</button>
            </form>
        </div>
@endsection
@section('scripts')
<script>
    $(document).on('click', '#Update_offer', function (e) {
        e.preventDefault();

        var formData = new FormData($('#UpdateOfferForm')[0]); // all data form

        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('Ajax-Offers.update')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) { //status get foder AjaxOffersController.php
                    $('#success_msg').show();
                }
            }, error: function (reject) {

            }
        });
    });
</script>
@endsection
