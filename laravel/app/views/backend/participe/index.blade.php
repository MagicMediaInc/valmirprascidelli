@extends ('backend.dashboard_layout')

@section("title")
	participes
@stop

@section("maincontent")
  <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Editable</strong> tables</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-red">
                            <h3 class="panel-title"><strong>Editable </strong> example</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    
                                </div>
                                @if(count($participes)==0)
                                  No hay registros
                                @else
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                    <table class="table table-striped table-hover dataTable" id="table-editable">
                                        <thead>
                                            <tr role="row">
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Tema</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($participes as $participe)
                                            <tr>
                                                <td>{{ $participe->nome }}</td>
                                                <td>{{ $participe->email }}</td>
                                                <td>{{ $participe->categoria }}</td>
                                                <td class="text-center">{{HTML::link("dashboard/participe/ver/".str_replace('/', '!', Hash::make( (string) $participe->id )), "  Ver",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}}     {{HTML::link("dashboard/participe/delete/".str_replace('/', '!', Hash::make( (string) $participe->id )), "  Remove",["class"=>"delete btn btn-danger fa fa-times-circle"])}}    
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