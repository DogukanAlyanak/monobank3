@extends('layouts.layout')

@section('page_title', 'Hoş Geldiniz')
@section('page_head', 'MonoBank')

@section('main_content')
    <div class="container">
        <div class="row pt-4">
            <div class="col-12">
                <a href="{{ route('game.room.create') }}" type="button" class="btn btn-primary col-12 col-md-auto mt-1">Oda Oluştur</a>
                <button type="button" class="btn btn-primary col-12 col-md-auto mt-1 go-room">Odaya Katıl</button>
                {{-- <a href="{{ route('game.room.join') }}" type="button" class="btn btn-primary">Odaya Katıl</a> --}}
            </div>
            <div class="col-12 mt-4">
                <h3>Odalarım</h3>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Oda Kodu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($gameRooms); --}}
                        @foreach($gameRooms as $i => $gameRoom)
                        <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td>{{ $gameRoom->uuid }}</td>
                            <td>
                                <a href="{{ route('game.room.show', ['gameRoom' => $gameRoom->uuid]) }}" class="btn btn-primary btn-sm w-100">Katıl</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.join_room_modal')
    @push('js')
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @endpush
@endsection
