@extends('layouts.app')

@section('content')
    <div style="width: 50%; margin-left: 50px">
        <h5>All User Donations</h5>
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Donation</th>
            <th scope="col">Description</th>
            <th scope="col">Picture</th>
            <th scope="col">Date</th>
            <th scope="col">Requests - User - Plea</th>

        </thead>
        <tbody>
        @foreach($donacii as $d)
            @if($d -> resolved == 0)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $d -> donation }} </td>
                    <td> {{ $d -> description }} </td>
                    <td>
                        @if($d -> image_path != "")
                            <img src="{{$d -> image_path}}">
                        @else
                            /
                        @endif
                    </td>
                    <td> {{ $d -> created_at }}</td>

                    <td>
                        @foreach($d->requests as $r)
                            {{ $r->nameUser->name }} -
                            {{ $r->request_plea }}
                            <br>
                        @endforeach
                    </td>

                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
