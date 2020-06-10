@extends('layouts.app2')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List product</h1>
    <a href="{{route('opencreateproduct')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create new</a>
</div>
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data product</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
          </tr>
        </tfoot>
        <tbody>
           @foreach ($products as $item)
           <tr>
            <td>{{$item->name}} </td>
            <td>{{$item->price}}</td>
            <td>{{$item->qty}}</td>
           </tr>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
