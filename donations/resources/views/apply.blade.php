@extends('layouts.app')

@section('content')
    <div style="width: 50%; margin-left: 50px">
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Donation</th>
                <th scope="col">Description</th>
                <th scope="col">Slika</th>
                <th scope="col">Broj Applications</th>

            </thead>
            <tbody>
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $donation->donation }}</td>
                    <td>{{ $donation->description }}</td>
                    <td><img src="{{$donation->image_path }}"></td>
                    <td>{{ $broj }}</td>
                </tr>
            </tbody>

            <form method="POST">
                @csrf
                <textarea class="form-control" name="plea">
                </textarea>
                @error('plea')
                <p> {{$message}} </p>
                @enderror
                <button class="btn alert-info" type="submit">Apply</button>
            </form>
        </table>
    </div>
@endsection
