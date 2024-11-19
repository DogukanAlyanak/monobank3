<!-- Modal -->
<div class="modal fade" id="inviteCodeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Odaya Katıl</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="input-group">

                                <input id="inviteCodeInput" type="password" class="form-control"
                                    aria-label="Oda Davet Kodu" value="{{ $gameRoom->invite_code }}">
                                {{-- <input id="inviteCodeInputCopy" type="hidden" value="{{ $gameRoom->invite_code }}"> --}}

                                <button class="btn btn-primary show-invite-code" type="button"><i
                                        class="fa-solid fa-eye"></i></button>
                                <button class="btn btn-primary copy-invite-code"
                                    data-copy="{{ $gameRoom->invite_code }}" type="button"><i
                                        class="fa-solid fa-copy"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="alert-p"></p>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).on(`click`, `.show-invite-code`, function() {
            let type = $(`#inviteCodeInput`).attr('type');
            if (type == "text") {
                $(`#inviteCodeInput`).attr('type', 'password');
            } else {
                $(`#inviteCodeInput`).attr('type', 'text');
            }
        })

        $(document).on(`click`, `.copy-invite-code`, function() {
            const dataCopyValue = $(this).data('copy');
            if (dataCopyValue) {
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(dataCopyValue).then(() => {
                        copyAlert("Kopyalandı: " + dataCopyValue);
                    }).catch(err => {
                        copyAlert('Failed to copy text: ' + err.message);
                    });
                } else {
                    copyToClipboardFallback(dataCopyValue);
                }
            } else {
                copyAlert('No data-copy attribute found');
            }
        });


        function copyToClipboardFallback(text) {
            const tempInput = document.createElement('textarea');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            try {
                document.execCommand('copy');
                copyAlert("Kopyalandı: " + text);
            } catch (err) {
                copyAlert('Fallback failed: ' + err.message);
            }
            document.body.removeChild(tempInput);
        }


        let copyTimer;
        function copyAlert(text) {
            console.log(text);
            $(`.alert-p`).html(text);
            clearTimeout(copyTimer);
            copyTimer = setTimeout(() => {
                $(`.alert-p`).html("");
            }, 5000);
        }
    </script>
@endpush

@push('css')
    <style>
        .alert-p {
            color: green;
        }
    </style>
@endpush
