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
            <form method="" action="" id="offerForm" enctype="multipart/form-data" >
                @csrf
                <div class="mb-3">
                    <label for="exampleInputname" class="form-label" >{{__('messges.Name Offer')}}</label>
                    <input type="text" class="form-control" name="name_en" id="exampleInputname" placeholder="{{__('messges.Name Offer')}}" aria-describedby="emailHelp">
                    <div id="name_en_error" class="text-danger" ></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputArabic" class="form-label" >{{__('messges.Name Arabic')}}</label>
                    <input type="text" class="form-control" name="name_ar" id="exampleInputArabic" placeholder="{{__('messges.Name Arabic')}}" aria-describedby="emailHelp">
                    <div id="name_ar_error" class="text-danger" ></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPrice" class="form-label">{{__('messges.Price Offer')}}</label>
                    <input type="number" class="form-control" name="price" placeholder="{{__('messges.Price Offer')}}" id="exampleInputPrice" >
                    <div id="price_error" class="text-danger" ></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputdetails" class="form-label">{{__('messges.Details Offer')}}</label>
                    <input type="text" class="form-control" name="details"  placeholder="{{__('messges.Details Offer')}}" id="exampleInputdetails">
                    <div id="details_error" class="text-danger" ></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhoto" class="form-label">{{__('messges.photo Offer')}}</label>
                    <input type="file" class="form-control" name="photo"  placeholder="{{__('messges.photo Offer')}}" id="exampleInputPhoto">
                    <div id="photo_error" class="text-danger"  ></div>
                </div>
                <button type="submit" id="save_offer" class="btn btn-primary">{{__('messges.Submit')}}</button>
            </form>
        </div>
@endsection
@section('scripts')
    {{-- Part one
    <script>
        $(document).on('click', '#save_offer', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('Ajax-Offers.store') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "name": $("input[name='name_en']").val(),
                    "name_en": $("input[name='name_en']").val(),
                    "price": $("input[name='price']").val(),
                    //"photo": $("input[name='name_en']").val(),,
                    "name_ar": $("input[name='name_ar']").val(),
                    "details": $("input[name='details']").val(),
                },
                success: function (data) {

                }, error: function (reject) {

                }
            });
        });
    </script>
    --}}


    <script>
        $(document).on('click', '#save_offer', function (e) {
            e.preventDefault();

            // reset value new refresh page
            $('#name_en_error').text('');
            $('#name_ar_error').text('');
            $('#price_error').text('');
            $('#details_error').text('');
            $('#photo_error').text('');

            var formData = new FormData($('#offerForm')[0]); // all data form

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('Ajax-Offers.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) { //status get foder AjaxOffersController.php
                        $('#success_msg').show();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>


@endsection
