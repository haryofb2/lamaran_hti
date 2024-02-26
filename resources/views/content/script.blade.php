<script>
    $(document).ready(function() {

        $('#user_list_menu').addClass('active');

        var transaction = $('#transaction_table').DataTable({
            processing: true,
            serverSide: true,
            autoFill: true,
            responsive: true,
            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function(row) {
            //                 var data = row.data();
            //                 // console.log(data.no_order_pekerjaan_01);
            //                 return 'Details for ' + data.no_registrasi;
            //             }
            //         }),
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            //             tableClass: 'table'
            //         })
            //     }
            // },
            lengthChange: false,
            // dom: 'BRSPQftir',
            // dom: 'Bftrip',
            dom: "<'row'<'col-sm-12 col-md-9'B><'col-sm-12 col-md-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "pageLength": 10,

            buttons: [{
                    name: "create",
                    text: '<i class="ki-duotone ki-add-item fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Create',
                    className: "btn-light-success",
                    attr: {
                        id: 'data-tambah'
                    }

                },

                'colvis'
            ],
            ajax: "{{ route('api.user.datatable') }}", // memanggil route yang menampilkan data json
            method: 'GET',
            columns: [{
                    title: 'Id',
                    data: 'user_id',
                    name: 'user_id'
                },
                {
                    title: 'Nama Pengguna',
                    data: 'user_fullname',
                    name: 'user_fullname'
                },
                {
                    title: 'Email',
                    data: 'user_email',
                    name: 'user_email'
                },
                {
                    title: 'Aksi',
                    data: 'action',
                    name: 'action',
                },

            ],

            deferRender: true,
            scrollCollapse: true,
            order: [

                [0, 'asc'],
            ],
        });
        transaction.buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
    });

    $(document).ready(function() {
        $(document).on('click', '#data-tambah', function() {
            $('#modal_add').modal('show');
            $("#form_edit").trigger("reset");
            $('#form_edit input').prop('readonly', false);
            $('button[type="submit"]').prop('hidden', false);
        });

        $(document).on('click', '#data_edit', function() {
            var user_id = $(this).data('id');
            $.post("{{ route('api.user.select') }}", {
                user_id: user_id
            }, function(data) {
                console.log(data);
                $("#form_edit").trigger("reset");
                $('#user_id').val(data.user_id);
                $('#user_fullname').val(data.user_fullname);
                $('#user_email').val(data.user_email);
                $('#modal_edit').modal('show');
            });
        });

        $(document).on('click', '#data_hapus', function() {
            var user_id = $(this).data('id');

            $('#user_id_delete').val(user_id);
            $('#modal_konfirmasi').modal('show');
        });

        $('#form_edit').submit(function(evt) {
            evt.preventDefault();

            var formData = new FormData(this);

            //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
            // jika id = form_edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
            // jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data

            var actionType = $('#tombol-simpan').val();
            $('#tombol-simpan').html('Sending..');

            console.log(formData);
            $.ajax({
                data: formData, //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                url: "{{ route('api.user.edit') }}", //url simpan data
                type: "POST", //karena simpan kita pakai method POST
                dataType: 'json', //data tipe kita kirim berupa JSON
                processData: false,
                contentType: false,
                success: function(data) { //jika berhasil
                    $('#form_edit').trigger("reset"); //form reset
                    $('#modal_edit').modal('hide'); //modal hide
                    $('#tombol-simpan').html('Save Changes'); //tombol simpan
                    var oTable = $('#transaction_table').DataTable(); //inialisasi datatable
                    oTable.ajax.reload(); //reset datatable
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Data Berhasil Disimpan',
                        message: '{{ Session('
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    success ') }}',
                        position: 'bottomRight '
                    });
                },
                error: function(data) { //jika error tampilkan error pada console
                    console.log('Error:', data);
                    $('#tombol-simpan').html('Save Changes');
                }

            })
        });

    });
    // $('#tombol-hapus').click(function() {
    //     var dataId = $(this).data('id');
    //     $.ajax({

    //         url: "/user_delete/" + dataId, //eksekusi ajax ke url ini
    //         type: 'POST',
    //         beforeSend: function() {
    //             $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
    //         },
    //         success: function(data) { //jika sukses
    //             setTimeout(function() {
    //                 $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
    //                 var oTable = $('#table_cabang').dataTable();
    //                 oTable.fnDraw(false); //reset datatable
    //             });
    //             iziToast.warning({ //tampilkan izitoast warning
    //                 title: 'Data Berhasil Dihapus',
    //                 message: "{{ Session('delete') }}",
    //                 position: 'bottomRight'
    //             });
    //         }
    //     })
    // });
</script>
