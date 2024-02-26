@extends('master')
@section('content')
    <div class="container">
        <div class="table-responsive" id="transaction">
            <table class="table nowrap table-row-bordered border rounded gs-7" style="width:100%" id="transaction_table">
            </table>
        </div>
    </div>
    @include('content.modal_add')
    @include('content.modal_edit')
    @include('content.modal_konfirmasi')
@endsection

@section('script')
    @include('content.script')
@endsection
