@extends ('backend.dashboard_layout')

@section("title")
  Uploads
@stop

@section("maincontent")
  <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Uploads</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-red">
                            <h3 class="panel-title"><strong>Uploads</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <div class="btn-group">
                                            {{HTML::link("dashboard/uploads/create","Incluir novo arquivo", array("class"=>"btn btn-danger fa fa-plus "))}} 
                                    </div>
                                </div>
                                @if(count($informations)==0)
                                  No hay registros
                                @else
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                    <table id="tosort"  class="table table-striped table-hover dataTable" id="table-editable">
                                        <thead>
                                            <tr role="row">
                                                <th>Titulo</th>
                                                <th>Descrição</th>
                                                <th>Date</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($informations as $information)
                                            <tr class="sortable" id="{{$information->id}}">
                                                <td class="move">{{$information->title}}</td>
                                                <td class="move">{{ $information->description }}</td>
                                                <td class="move ago">{{ $information->created_at }}</td>
                                                <td class="move text-center">{{HTML::link("dashboard/uploads/update/".str_replace('/', '!', Hash::make( (string) $information->id )), "  Edição",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}} {{HTML::link("dashboard/uploads/delete/".str_replace('/', '!', Hash::make( (string) $information->id )), "  Remove",["class"=>"delete btn btn-danger fa fa-times-circle"])}}    
                                                </td>
                                            </tr>
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
            <!-- END MAIN CONTENT -->
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
                                                                url: 'uploads/order',
                                                                type: 'POST',
                                                                data: data,
                                                                dataType: 'json',
                                                                success:function(e){
                                                                    alert("ordenado exitosamente "+ e);
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
  <!-- {{HTML::script("assets/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js")}}
  {{HTML::script("assets/admin/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.bootstrap.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.tableTools.js")}}
  {{HTML::script("assets/admin/assets/js/table_editable.js")}} -->
    {{HTML::script("assets/admin/assets/plugins/moment/moment.js")}}

@stop