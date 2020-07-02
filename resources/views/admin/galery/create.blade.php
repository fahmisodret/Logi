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
                    <label for="project_id" class="col-sm-4 control-label">Project</label>
                    <div class="col-sm-8">
                        <select name="project_id" class="form-control">
                            <option value="0">Pilihan</option>
                            @foreach($project as $prj)
                                <option value="{{$prj->id}}">{{$prj->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail_id" class="col-sm-4 control-label">Project Detail(type project)</label>
                    <div class="col-sm-8">
                        <select name="detail_id" class="form-control">
                            <option value="0">Pilihan</option>
                            @foreach($detail as $d)
                                <option value="{{$d->id}}">{{$d->project->title}} | {{$d->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fasilitas_id" class="col-sm-4 control-label">Fasilitas</label>
                    <div class="col-sm-8">
                        <select name="fasilitas_id" class="form-control">
                            <option value="0">Pilihan</option>
                            @foreach($fasilitas as $f)
                                <option value="{{$f->id}}">{{$f->project->title}} | {{$f->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-4 control-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="image" placeholder="image">
                        <span class="text-danger"><strong>max: 2mb<strong></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="keterangan" placeholder="keterangan" cols="2"></textarea>
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
