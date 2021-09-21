@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h5 class="h3">All donations</h5>
                        <table class="table">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Donation</th>
                                <th scope="col">Description</th>
                                <th scope="col">Slika</th>
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
                                    <td>
                                        <a href="/apply/{{ $d->id }}">Apply</a>
                                    </td>
                                    <td>
                                        <a href="/select/{{ $d->id }}">Select for donation</a>
                                    </td>
                                    <td>
                                    <form method="POST">
                                        @csrf
                                        <input class="form-control" name="m" type="hidden" value="{{ $d->id }}">
                                        <button class="btn alert-info" type="submit">Donate at random</button>

                                    </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
