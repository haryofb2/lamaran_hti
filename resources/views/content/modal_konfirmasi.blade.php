<div class="modal fade" tabindex="-1" id="modal_konfirmasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Master Pengguna</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('user.delete') }}" method="post" id="form_edit">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="user_id_delete" id="user_id_delete" value="">
                    </div>
                    <h3 class="text-center text-capitalize">apa anda yakin ?</h3>

            </div>
            <div class="modal-footer">
                <button type="submit" id="tombol-simpan" class="btn btn-primary">YA</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">TIDAK</button>

                </form>
            </div>

        </div>
    </div>
</div>
