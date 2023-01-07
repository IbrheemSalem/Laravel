@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">hospital</th>
                    <th scope="col">address	</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @if(isset($hospital) && $hospital->count() > 0)
                    @foreach ( $hospital as $hos )
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <th scope="row">{{ $hos->id }}</th>
                            <td>{{ $hos->name }}</td>
                            <td>{{ $hos->address }}</td>
                            <td>
                                <a href="{{ route('table.doctor',$hos->id) }}" class="btn btn-success">Doctors</a>
                                <a href="{{ route('hospital.delete',$hos->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
