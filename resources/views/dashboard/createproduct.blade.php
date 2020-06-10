@extends('layouts.app2')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List product</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create new</a>
</div>
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data product</h6>
  </div>
  <div class="card-body">
    <form class="user" method="POST" action={{route('createproduct')}} enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control form-control-user" id="inputnamabarang"  name="name" placeholder="Kurma">
          </div>
        <div class="form-group row">

          <div class="col-sm-6 mb-3 mb-sm-0">
              <label>Harga</label>
            <input type="text" class="form-control form-control-user" id="inputhargabarang" name="price" placeholder="30.000">
          </div>
          <div class="col-sm-6">
              <label>Jumlah</label>
            <input type="text" class="form-control form-control-user" id="inputjumlahbarang" name="qty" placeholder="5">
          </div>
        </div>

        <div class="form-group">
            <label>Upload gambar</label>

            <input type="file" class="form-control form-control-user" id="exampleInputPassword" name="image" placeholder="Password">

        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
          Create
        </button>
        <hr>
      </form>
  </div>
</div>
@endsection
