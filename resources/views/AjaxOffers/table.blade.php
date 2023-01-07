@extends('AjaxOffers/layout.masters')
@section('content')
        <div class="container">
            <div class="alert alert-success" id="success_msg"  style="display:none"role="alert">
                {{__('messges.The item has been deleted successfully')}}
            </div>
        </div>
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
                    <a class="navbar-brand" href="#">{{ __('messges.Table Of Data') }}</a>
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
                        <th scope="col" class="w-25">{{__('messges.Details Offer')}}</th>
                        <th scope="col">{{__('messges.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Offers as $offer)
                            <tr class="offerRow{{$offer->id}}">
                                <th scope="row">{{ $offer->id }}</th>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->price }}</td>
                                <td><img src="/images/offers/{{ $offer->photo }}" style="width:50px"></td>
                                <td>{{ $offer->details }}</td>
                                <td>
                                    <a href="{{ route('Ajax-Offers.edit',$offer->id)}}" class="btn btn-success">{{__('messges.Up Date')}}</a>
                                    <a href="" offer_id="{{ $offer->id }}"  class="btn btn-danger delete_btn">{{__('messges.Delete')}}</a>
                                </td>
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
@section('scripts')
    <script>
        $(document).on('Keyup', '#search-all-canned-replies', function () {

            var search_content =  $(this).val();

            if(search_content !=''){
                $.ajax({
                    url: 'search-all-canned-replies',
                    method: 'GET',
                    data: {search_content},
                    dataType: 'json'
                    success: function (data) {
                        console.log(data);
                    }, error: function (reject) {
                    }
            });
            }
        });












        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
                var offer_id =  $(this).attr('offer_id');
            $.ajax({
                type: 'post',
                url: "{{ route('Ajax-Offers.delete') }}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id' :offer_id // attr of a link
                },
                success: function (data) {
                    if(data.status == true){
                        $('#success_msg').show();
                    }
                    $('.offerRow'+data.id).remove(); //delete class of not reload page
                }, error: function (reject) {
                }
            });
        });
    </script>
@endsection
