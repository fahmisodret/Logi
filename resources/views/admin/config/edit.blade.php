@extends('admin.layout.index')

@section('content')
<div class="col-md-12 card">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Konfigurasi</h3>
        <hr/>
    </div>
    <div class="box-body">
        <hr style="margin: 10px 0 15px 0">
        <form name="form-soal" method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/config/update/'.$data->id) }}">
            {{ csrf_field() }}
            <div class="box-body">
                <input type="hidden" class="form-control" name="name" placeholder="name" value="{{$data->name}}">
                <div class="form-group">
                    <label for="keterangan" class="col-sm-2 control-label">{{ucfirst($data->name)}}</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="keterangan" placeholder="keterangan" cols="2">{{$data->keterangan}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div id="wrap-btn">
                            <a href="{{ url('/admin/config')}}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-info" id="btnSimpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
