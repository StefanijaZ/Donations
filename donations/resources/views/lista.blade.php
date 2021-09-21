@extends('layouts.app')

@section('content')
    <div style="width: 50%; margin-left: 50px">
        <div>
            <h5>List Of User Donations</h5>
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Donation</th>
                    <th scope="col">Description</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Slika</th>
                </thead>
                <tbody>
                    @foreach($donacii as $d)
                        @if($d -> resolved == 0)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{ $d -> donation }} </td>
                                <td> {{ $d -> description }} </td>
                                <td> {{ $d -> user_id }} </td>
                                <td>
                                    @if($d -> image_path != "")
                                        <img src="{{$d -> image_path}}">
                                    @else
                                        /
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h5>List Of User Request</h5>
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Donation</th>
                    <th scope="col">Description</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Slika</th>

                </thead>
                <tbody>
                    @foreach($donA as $a)
                        @if($a -> resolved == 0)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{ $a -> donation }} </td>
                                <td> {{ $a -> description }} </td>
                                <td> {{ $a -> user_id }} </td>
                                <td>
                                    @if($a -> image_path != "")
                                        <img src="{{$a -> image_path}}">
                                    @else
                                        /
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
