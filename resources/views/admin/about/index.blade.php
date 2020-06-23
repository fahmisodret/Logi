@extends('admin.layout.index')

@section('content')
<div class="col-md-12 card">
  <div class="box box-primary">
    <div class="box-header with-border">
        <br/>
        <div class="col-md-6">
            <h3 class="box-title">Data About</h3>
        </div>
        <div class="col-md-6">
            <a href="{{url("admin/about/create")}}" class="btn btn-success btn-sm">Tambah</a> 
        </div>
    </div>
    <div class="box-body">
        <hr style="margin: 10px 0 15px 0">
        <table class="table table-hover table-striped" id="table_user">
            <thead>
              <tr>
                <th>Name</th>
                <th>Title</th>
                <th>FB</th>
                <th>Twitter</th>
                <th>In</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if(count($data) <= 0)
                <tr>
                    <td colspan="6">Data Kosong</td>
                <tr>
                @endif
                @foreach($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->fb}}</td>
                    <td>{{$item->twitter}}</td>
                    <td>{{$item->in}}</td>
                    <td><div style="text-align:center">
                        <a href="{{url("admin/about/edit/".$item->id)}}" class="btn btn-warning btn-xs">Ubah</a> 
                        <a href="{{url("admin/about/destroy/".$item->id)}}" class="btn btn-danger btn-xs">Hapus</a> 
                    </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
