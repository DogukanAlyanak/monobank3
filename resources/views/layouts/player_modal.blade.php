<!-- Modal -->
<div class="modal fade" id="authPlayerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Oyuncu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <form id="saveAuthPlayer" class="form-group">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Oyuncu Adı</label>
                        <input id="authPlayerNameInput" type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div>
            </form>



        </div>
    </div>
</div>
