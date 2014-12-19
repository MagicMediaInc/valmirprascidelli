@extends ('backend.dashboard_layout')

@section("title")
	Galerias
@stop

@section("maincontent")
  <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Galerias</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-red">
                            <h3 class="panel-title"><strong>Galerias </strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <div class="btn-group">
                                            {{HTML::link("dashboard/albums/create","Incluir nova Galeria", array("class"=>"btn btn-danger fa fa-plus "))}} 
                                    </div>
                                    
                                </div>
                                @if(count($albums)==0)
                                  Não tem registros
                                @else
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                    <table id="tosort" class="table table-striped table-hover dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th>Título</th>
                                                <th>Data</th>
                                                <th>Galeria Principal</th>
                                                <th>Vinculo</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($albums as $album)
                                            @if($album->status==1)
                                            <tr class="sortable" id="{{$album->id}}">
                                                <td class="move">{{ $album->title }}</td>
                                                <td class="ago move">{{ $album->created_at }}</td>
                                                <td class="move">{{ $album->visible == 0 ? "Off" : "On" }}</td>
                                                <td class="move">{{ $album->type }}</td>
                                                <td class="text-center move">{{HTML::link("dashboard/albums/edit/".str_replace('/', '!', Hash::make( (string) $album->id )), "  Edição",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}}     {{ $album->type != 'dependent' ? HTML::link("dashboard/albums/delete/".str_replace('/', '!', Hash::make( (string) $album->id )), "  Deletar",["class"=>"delete btn btn-danger fa fa-times-circle"]) : '<!-- '.HTML::link("dashboard/albums/delete/".str_replace('/', '!', Hash::make( (string) $album->id )), "  Remove",["class"=>"delete btn btn-danger fa fa-times-circle"]).'-->' }}    
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
            <script>
            $(document).on("ready",function(){
                // $('td.move, th', '#tosort').each(function () {
                //     var cell = $(this);
                //     cell.width(cell.width());
                // });
                $("#tosort tbody").sortable({
                                                    connectWith: '.sortable',
                                                    placeholder: "ui-state-highlight",
                                                    helper:'clone',
                                                    update:function(evt,elem){
                                                         var imgid = $(this).sortable("toArray");
                                                         var data = {};

                                                             for (var i = 0; i < imgid.length; i++) {
                                                                data["id"+i]=imgid[i];
                                                             };
                                                         // alert(data["id1"].toString());
                                                         // for (var i = 0; i <= imgid.length; i++) {
                                                         //     data.push(key[i]=imgid[i]);
                                                         // };
                                                             console.log(data);
                                                             $.ajax({
                                                                url: '/dashboard/albums/orden',
                                                                type: 'POST',
                                                                data: data,
                                                                dataType: 'json',
                                                                success:function(e){
                                                                    // alert("ordenado exitosamente "+ e);
                                                                },
                                                                error:function(e){
                                                                    out="";
                                                                    for (var i in e) {
                                                                        out += i + ": " + e[i] + "\n";
                                                                    }
                                                                    console.log("error al almacenar "+ out.toString());
                                                                    }
                                                                })
                                                         
                                                    }
                                                }).disableSelection();
            })
            </script>
        </div>
@stop

@section("plugins")
{{HTML::script("assets/admin/assets/plugins/moment/moment.js")}}
  <!--{{HTML::script("assets/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js")}}
  {{HTML::script("assets/admin/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.bootstrap.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.tableTools.js")}}
  {{HTML::script("assets/admin/assets/js/table_editable.js")}}-->
@stop