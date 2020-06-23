@extends('admin.layout.index')

@section('content')
<div class="col-md-12 card">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Input Galery</h3>
        <hr/>
    </div>
    <div class="box-body">
        <hr style="margin: 10px 0 15px 0">
        <form name="form-soal" method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/galery/store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="N">
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="image" placeholder="image">
                        <span class="text-danger"><strong>max: 2mb<strong></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div id="wrap-btn">
                            <a href="{{ url('/admin/galery')}}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-info" id="btnSimpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
