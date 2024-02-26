<div class="modal fade" tabindex="-1" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pengguna Baru</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="post" id="form_add">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="user_id_add" id="user_id_add" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label text-capitalize" for="user_fullname">nama
                            lengkap</label>
                        <input type="text" class="form-control" id="user_fullname_add" name="user_fullname_add">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label text-capitalize" for="exampleFormControlInput1">email</label>
                        <input type="email" class="form-control" id="user_email_add" name="user_email_add">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label text-capitalize" for="exampleFormControlInput1">password</label>
                        <input id="password_add" type="password" class="form-control" name="password_add" required
                            autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label class="form-check-label text-capitalize" for="exampleFormControlInput1">konfirmasi
                            password</label>
                        <input id="password-confirm_add" type="password" class="form-control"
                            name="password_confirmation_add" required autocomplete="new-password">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" id="tombol-simpan-add" class="btn btn-primary">Save</button>

            </div>
            </form>

        </div>
    </div>
</div>
