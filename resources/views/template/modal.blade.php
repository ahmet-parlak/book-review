<a href="" data-toggle="modal" data-target="#bookRequest" class="btn-sm btn-success">Talep Oluştur</a>


<div class="modal fade" id="bookRequest" tabindex="-1" role="dialog" aria-labelledby="bookRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookRequestLabel">Kitap Bilgileri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="isbn" class="col-form-label font-weight-bold">ISBN:</label>
                        <input type="text" class="form-control" id="isbn" min="13" max="13">
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-form-label font-weight-bold">Yazar:</label>
                        <input type="text" class="form-control" id="author" min="3" max="64">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label font-weight-bold">Yayınevi:</label>
                        <input type="text" class="form-control" id="recipient-name" min="13" max="13">
                    </div>
                    {{-- <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                <button type="button" class="btn btn-primary">Talep Oluştur</button>
            </div>
        </div>
    </div>
</div>
