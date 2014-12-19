@extends("backend.dashboard_layout");

@section("maincontent")
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Atualizar página</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                {{Form::open()}}
                                {{ Form::hidden('idHash', Hash::make( (string) $page->id ) ) }}

                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <label class="form-label"><strong>Titulo</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
											{{ Form::text('descripcion', $page->description, array('id'=>'descripcion', "class"=>"form-control")) }}
                                        </div>
                                    </div>
                                     <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                        <label class="form-label"><strong>Status</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
                                            @if($page->status=="on")
                                       		   <input id="status" name="status" checked data-on-color="info" data-off-color="danger" type="checkbox" class="switch">
                                            @else
                                               <input id="status" name="status" data-on-color="info" data-off-color="danger" type="checkbox" class="switch">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3 col-xs-3">
                                        <label class="form-label"><strong></strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
                                        	{{Form::submit('Salvar', ['class' => 'btn btn-large btn-success openbutton'])}}
                                        	{{Form::button("Voltar",array("class"=>"btn btn-info", "onclick"=>"window.history.back()"))}}
                                        </div>
                                    </div>
                                {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
@stop

@section("plugins")
 	{{HTML::script("assets/admin/assets/plugins/datetimepicker/jquery.datetimepicker.js")}}
    {{HTML::script("assets/admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js")}}
    {{HTML::script("assets/admin/assets/plugins/pickadate/picker.js")}}
    {{HTML::script("assets/admin/assets/plugins/pickadate/picker.date.js")}}
    {{HTML::script("assets/admin/assets/plugins/pickadate/picker.time.js")}}
    <!-- {{HTML::script("assets/admin/assets/plugins/icheck/custom.js")}} -->
    {{HTML::script("assets/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js")}}
    {{HTML::script("assets/admin/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js")}}
    {{HTML::script("assets/admin/assets/js/form.js")}}
@stop