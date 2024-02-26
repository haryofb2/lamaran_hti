@extends('master')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="card shadow h-100 bg-primary">
                    <div class="card-body text-center text-uppercase">
                        <h1 id="user"></h1>
                        <h4>pengguna terdaftar</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow h-100 bg-primary">
                    <div class="card-body text-center text-uppercase">
                        <h1 class="text-center" id="user_active"></h1>
                        <h4>pengguna aktif</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#dashboard_menu').addClass('active');

            $.get("{{ route('api.user.all') }}", {}, function(data) {
                $('#user').html(data);
            });

            $.get("{{ route('api.user.active') }}", {}, function(data) {
                $('#user_active').html(data);
            });
        });
    </script>
@endsection
