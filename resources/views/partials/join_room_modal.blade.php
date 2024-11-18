<!-- Modal -->
<div class="modal fade" id="joinRoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Odaya Katıl</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <form class="form-group" method="POST" action="{{ route('game.room.join') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Oda Kodu veya Davet Kodu</label>
                        <input type="text" class="form-control" name="code">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Git</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                </div>
            </form>



        </div>
    </div>
</div>
