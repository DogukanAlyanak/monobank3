@extends('layouts.layout')

@section('page_title', 'Oda')
@section('page_head', 'Oyuncular')
@section('page_buttons')
    <button type="button" class="btn btn-primary col-12 col-md-auto invite-code-open-modal">
        <i class="fa-solid fa-eye"></i>
        Davet Et
    </button>
@endsection

@section('main_content')

    @include('partials.room_invite_modal')
@endsection

@push('js')
    <script>
        $(document).on(`click`, `.invite-code-open-modal`, function() {
            $(`#inviteCodeModal`).modal('show');
        })
    </script>
@endpush
