@extends('layouts.layout')

@section('page_title', 'Hoş Geldiniz')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 text-center">
                <h1>Mono Bank'a Hoş Geldiniz!</h1>
            </div>
            <div class="col-12">
                <a href="{{ route('game.room.create') }}" type="button" class="btn btn-primary">Oda Oluştur</a>
                {{-- <a href="{{ route('game.room.join') }}" type="button" class="btn btn-primary">Odaya Katıl</a> --}}
            </div>
        </div>
    </div>
@endsection
