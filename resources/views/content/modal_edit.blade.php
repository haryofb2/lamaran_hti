<div class="modal fade" tabindex="-1" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">konfirmasi delete</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="#" method="post" id="form_delete">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="user_id" id="user_id" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label text-capitalize" for="user_fullname">nama
                            lengkap</label>
                        <input type="text" class="form-control" id="user_fullname" name="user_fullname">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label text-capitalize" for="exampleFormControlInput1">email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" id="tombol-simpan" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>
