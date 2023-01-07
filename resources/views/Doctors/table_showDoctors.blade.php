@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">address	</th>
                    <th scope="col">title</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @if(isset($doctor) && $doctor->count() > 0)
                    @foreach ( $doctor as $doc )
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <th scope="row">{{ $doc->id }}</th>
                            <td>{{ $doc->name }}</td>
                            <td>{{ $doc->address }}</td>
                            <td>{{ $doc->title }}</td>
                            <td><a href="{{ route('creat.service',$doc->id) }}" class="btn btn-success">View majors</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
