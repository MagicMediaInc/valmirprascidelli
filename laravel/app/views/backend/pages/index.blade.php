@extends ('backend.dashboard_layout')

@section("title")
	Paginas
@stop

@section("maincontent")
  <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Paginas</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-red">
                            <h3 class="panel-title"><strong>Paginas</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <div class="btn-group">
                                            {{HTML::link("dashboard/pages/create","Incluir nova Pagina", array("class"=>"btn btn-danger fa fa-plus "))}} 
                                    </div>
                                    
                                </div>
                                @if(count($pages)==0)
                                  Não tem registros
                                @else
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                    <table class="table table-striped table-hover dataTable" id="table-editable">
                                        <thead>
                                            <tr role="row">
                                                <th>Items</th>
                                                <th>Descrição</th>
                                                <th>Status</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$page->description}}</td>
                                                <td>{{$page->status}}</td>
                                                <td class="text-center">{{HTML::link("dashboard/pages/update/".str_replace('/', '!', Hash::make( (string) $page->id )), "  Edição",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}}     
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


        </div>
@stop

@section("plugins")
  {{HTML::script("assets/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js")}}
  {{HTML::script("assets/admin/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.bootstrap.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.tableTools.js")}}
  {{HTML::script("assets/admin/assets/js/table_editable.js")}}
@stop