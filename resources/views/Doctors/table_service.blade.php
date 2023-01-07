@extends('layouts.app')
@section('content')
    <div class="container w-50">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Service</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @if(isset($service) && $service->count() > 0)
                    @foreach ( $service as $ser )
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <th scope="row">{{ $ser->id }}</th>
                            <td>{{ $ser->name }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="container mb-5">
        <form method="POST" action="{{ route('insert.service.doctor') }}">
            @csrf
            <div class="input-group mb-5">
                <label class="input-group-text" for="inputGroupSelect01">Doctors</label>
                <select class="form-select" id="inputGroupSelect01" name="doctor_id">
                    <option selected>Choose...</option>
                    @if(isset($doctors) && $doctors->count() > 0)
                        @foreach ( $doctors as $doctor )
                            <option value="{{  $doctor->id }}">{{  $doctor->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="input-group mb-3 mt-5">
                <label class="input-group-text" for="inputGroupSelect01">Services</label>
                <select class="form-select" multiple aria-label="multiple select example" name="servicesIds[]">
                    @if(isset($allservices) && $allservices->count() > 0)
                        @foreach ( $allservices as $allservice )
                            <option value="{{  $allservice->id }}">{{  $allservice->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
