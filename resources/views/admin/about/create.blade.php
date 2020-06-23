@extends('admin.layout.index')

@section('content')
<div class="col-md-12 card">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Input About</h3>
        <hr/>
    </div>
    <div class="box-body">
        <hr style="margin: 10px 0 15px 0">
        <form name="form-soal" method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/about/store') }}">
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
                    <label for="title" class="col-sm-2 control-label">Judul</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" placeholder="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="image" placeholder="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fb" class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="fb" placeholder="fb">
                    </div>
                </div>
                <div class="form-group">
                    <label for="twitter" class="col-sm-2 control-label">Twitter</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="twitter" placeholder="twitter">
                    </div>
                </div>
                <div class="form-group">
                    <label for="in" class="col-sm-2 control-label">Linked In</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="in" placeholder="in">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div id="wrap-btn">
                            <a href="{{ url('/admin/about')}}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-info" id="btnSimpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
