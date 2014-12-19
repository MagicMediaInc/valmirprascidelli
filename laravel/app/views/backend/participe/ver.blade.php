@extends("backend.dashboard_layout");

@section("maincontent")
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Participe</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <label class="form-label"><strong>Nome</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
											{{$participe->nome}}
                                        </div>
                                        <label class="form-label"><strong>Email</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
											{{$participe->email}}
                                        </div>
                                         <label class="form-label"><strong>Tema</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
                                            {{$participe->categoria}}
                                        </div>
                                         <label class="form-label"><strong>Mensagem</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
                                            {{$participe->description}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3 col-xs-3">
                                        <label class="form-label"><strong></strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
                                        	{{HTML::link("dashboard/participe/delete/".str_replace('/', '!', Hash::make( (string) $participe->id )), "  Remove",["class"=>"delete btn btn-danger fa fa-times-circle"])}}
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