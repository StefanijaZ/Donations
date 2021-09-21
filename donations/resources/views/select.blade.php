@extends('layouts.app')

@section('content')
    <body>
        <form method="POST">
            @csrf
            <select class="form-control" name="izbran">
                @foreach($donation->requests as $r)
                    <option value="{{ $r->imeUser->id }}"> {{ $r->imeUser->name }}</option>
                @endforeach
            </select>
                @error('izbran')
                    <p> {{ $message }}</p>
                @enderror
            <button class="btn alert-info" type="submit">Choose</button>
        </form>
@endsection
