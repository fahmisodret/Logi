@extends('admin.layout.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="col-md-12 card">
  <div class="box box-primary">
    <div class="box-header with-border">
        <br/>
        <div class="col-md-6">
            <h3 class="box-title">Data Menu</h3>
        </div>
        <form name="form-soal" method="POST" class="form-horizontal" id="formSoal" action="{{ url('/admin/menu/store') }}">
            {{ csrf_field() }}
            <div class="form-group col-md-6">
                <label for="paket" class="col-sm-4 control-label">Menu</label>
                <div class="col-sm-8">
                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus placeholder="NamaMenu">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="paket" class="col-sm-4 control-label">Parent</label>
                <div class="col-sm-8">
                    <select name="parent_id" class="form-control">
                        <option value="0" selected>No Parent</option>
                        @foreach($menus as $mm)
                            <option value="{{$mm->id}}">{{$mm->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <Button type="submit" class="btn btn-success btn-sm">Tambah</Button> 
            </div>
        </form>
    </div>
    <div class="box-body">
        <hr style="margin: 10px 0 15px 0">
        {{-- <table class="table table-hover table-striped" id="table_user">
            <thead>
              <tr>
                <th>Name</th>
                <th>Plural</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if(count($menus) <= 0)
                <tr>
                    <td colspan="4"><caption>Data Kosong</caption></td>
                <tr>
                @endif
                @foreach($menus as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->plural}}</td>
                    <td><div style="text-align:center">
                        <a href="{{url("admin/user/destroy/".$item->id)}}" class="btn btn-danger btn-xs">Hapus</a> 
                        <a href="{{url("admin/user/edit/".$item->id)}}" class="btn btn-warning btn-xs">Ubah</a> 
                        <a href="{{url("admin/user/show/".$item->id)}}" class="btn btn-success btn-xs">Detail</a>
                    </div></td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
        @if(isset($menu) && count($menu) > 0)
            <div class="form-group col-md-6" id="f_edit">
                <label class="col-sm-4 control-label">Menu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="menu_id" id="menu_id">
                    <input type="text" class="form-control" name="menu_name" id="menu_name">
                    <button class="btn btn-sm btn-success" id="btn_edit">Edit</button>
                </div>
            </div>
            <div class="tree ">
                <ul>
                    @foreach($menu as $mainkey => $item)
                    <li>
                        <span class="col-md-6">
                            <i class="expanded">
                                <input type="checkbox" class="inp" value="{{$mainkey}}" data-check="{{$item['name']}}"/>
                            </i> 
                            <a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#{{$item['name']}}" aria-expanded="true" aria-controls="{{$item['name']}}">
                                <i class="collapsed"><i class="fas fa-folder"></i></i>
                                <i class="expanded"><i class="far fa-folder-open"></i></i>
                                <span class="v_name" style="border:none">{{$item['name']}}</span>
                            </a>
                            <a class="btn btn-info btn-xs medit" data-id="{{$mainkey}}" data-name="{{$item['name']}}">edit</a>
                            <a href="{{url("admin/menu/destroy/".$mainkey)}}" class="btn btn-danger btn-xs">
                                Hapus
                            </a> 
                            <a href="{{url('generate/'.$item['plural'].'/index')}}" class="btn btn-primary btn-xs">
                                Go
                            </a> 
                        </span>
                        @if(isset($item['child']))
                        <div id="{{$item['name']}}" class="collapse show">
                            <ul>
                                @foreach($item['child'] as $key => $sub)
                                <li>
                                    <span class="col-md-4">
                                        <input type="checkbox" value="{{$key}}" class="inp"/>
                                        <a href="#!" class="v_name"> {{$sub['name']}}</a>
                                        <a class="btn btn-info btn-xs medit" data-id="{{$mainkey}}" data-name="{{$item['name']}}">edit</a>
                                        <a href="{{url("admin/menu/destroy/".$key)}}" class="btn btn-danger btn-xs">
                                            Hapus
                                        </a> 
                                        <a href="{{url('generate/'.$item['plural'].'/index')}}" class="btn btn-primary btn-xs">
                                            Go
                                        </a> 

                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $('.inp').click(function(){
        var target = $(this).data('check');
        $('#'+target).find('.inp').each(function (index, el) {
            ($(el).is(':checked'))
            ?$(el).prop("checked", false)
            :$(el).prop("checked", true);
        });
    });

    $('.medit').click(function(){
        $('#menu_id').val($(this).data('id'));
        $('#menu_name').val($(this).data('name'));
        $("#menu_name").change(function(){
            
        });
    });

    $('#btn_edit').click(function(){
        var dataString = { 
              // link : $("#link").val(),
              _token: "{{ csrf_token() }}",
              id : $("#menu_id").val(),
              name : $("#menu_name").val()
            };

        $.ajax({
            type: "POST",
            url: "{{url('admin/menu/update')}}/"+$("#menu_id").val(),
            data: dataString,
            success: function(data){
                alert('berhasil dirubah');
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });
</script>
@endsection