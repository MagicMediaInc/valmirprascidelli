@extends ('backend.dashboard_layout')

@section("title")
	{{$informations[0]->pages['description']}}
@stop
<?php $pagina=$informations[0]->pages['description'] ?>
@section("maincontent")
  <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>{{$informations[0]->pages['description']}}</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-red">
                            <h3 class="panel-title"><strong>{{$informations[0]->pages['description']}}</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <div class="btn-group">
                                            {{HTML::link("dashboard/informations/create/".$informations[0]->pages['id'],"Incluir nova $pagina", array("class"=>"btn btn-danger fa fa-plus "))}} 
                                    </div>
                                   <!--  <div class="btn-group pull-right">
                                       <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                       </button>
                                       <ul class="dropdown-menu pull-right">
                                           <li><a href="#">Print</a>
                                           </li>
                                           <li><a href="#">Save as PDF</a>
                                           </li>
                                           <li><a href="#">Export to Excel</a>
                                           </li>
                                       </ul>
                                   </div> -->
                                </div>
                                @if(count($informations)==0)
                                  Não tem registros
                                @else
                                <div  class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                    <table id="tosort" class="table table-striped table-hover dataTable" >
                                        <thead>
                                            <tr role="row">
                                                <th>Pagina</th>
                                                <th>Titulo</th>
                                                <th>Descrição</th>
                                                <th>Img. Destaque</th>
                                                <th>Data</th>
                                                <th>Galeria</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($informations) > 0)
                                        @foreach($informations as $information)
                                            <tr class="sortable" id="{{$information->id}}">
                                                <td class="move">{{$information->pages['description']}}</td>
                                                <td class="move">{{$information->title}}</td>
                                                <td class="move">{{$information->description}}</td>
                                                <td class="move"><img src="{{$information->mainImage}}" width="50px"/></td>
                                                <td class="ago move">{{$information->dateInformation}}</td>
                                                <td class="move move">{{HTML::link('dashboard/albums/add/'.str_replace('/', '!', Hash::make( (string) $information->idAlbum)), '  Incluir',["class"=>"edit btn btn-primary fa fa-plus"])}}</td>
                                                <td class="text-center move">{{HTML::link("dashboard/informations/update/".str_replace('/', '!', Hash::make( (string) $information->id )), "  Edição",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}}     {{HTML::link("dashboard/informations/delete/".str_replace('/', '!', Hash::make( (string) $information->id )), "  Deletar",["class"=>"delete btn btn-danger fa fa-times-circle"])}} 
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        <!-- <tr id="links"><td colspan="7" style="text-align:center;"></td></tr> -->
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
                                                         alert(data["id1"].toString());
                                                         // for (var i = 0; i <= imgid.length; i++) {
                                                         //     data.push(key[i]=imgid[i]);
                                                         // };
                                                             console.log(data);
                                                             $.ajax({
                                                                url: '/dashboard/informations/order',
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
            <!-- END MAIN CONTENT -->


        </div>
@stop

@section("plugins")
  <!-- {{HTML::script("assets/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js")}}
  {{HTML::script("assets/admin/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.bootstrap.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.tableTools.js")}}
   -->{{HTML::script("assets/admin/assets/plugins/moment/moment.js")}}
  <!-- {{HTML::script("assets/admin/assets/js/table_editable.js")}} -->
  <!-- {{HTML::script("assets/js/index.js")}} -->
@stop