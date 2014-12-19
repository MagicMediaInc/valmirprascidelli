@extends("backend.dashboard_layout");

@section("maincontent")
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ingresar {{$actual->description}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @if(isset($err))
                                <?php $errors = json_decode($err); ?>
                                @foreach($errors as $key => $value)
                                    <div class="alert alert-danger show">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <p>{{$value[0]}}</p>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                {{Form::open(array('files' => true, 'id'=>'form-create'))}}
                                {{Form::hidden('content', '' ,array('style'=>'display:none;'))}}
                                    <div class="form-group col-md-7 col-sm-7 col-xs-7">
                                        <div class="row">
                                            <label class="form-label"><strong>Titulo</strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                {{ Form::text('title', '', array('id'=>'title', "class"=>"form-control")) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label"><strong>Descrição </strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                {{ Form::text('description', '', array('id'=>'description', "class"=>"form-control")) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label"><strong>Conteúdo </strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                <div id="content" class="summernote"></div>
                                                <!-- {{ Form::text('description', '', array('id'=>'description', "class"=>"form-control")) }} -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label"><strong></strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                {{Form::submit('Salvar', ['class' => 'btn btn-large btn-success openbutton'])}}
                                                {{Form::button("Voltar",array("class"=>"btn btn-info", "onclick"=>"window.history.back()"))}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-sm-5 col-xs-5">
                                        <div class="row">
                                            <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                                <label class="form-label"><strong>Status</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                           		   <input id="status" name="status" checked data-on-color="info" data-off-color="danger" type="checkbox" class="switch">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label class="form-label"><strong>Data</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                                   <input id="dateInfo" name="dateInfo" type="text" class="datetimepicker" data-inline="true" style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label class="form-label"><strong>Img. Destaque</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                                    <span class="btn btn-success fileinput-button">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    <span>Incluir...</span>
                                                    <input type="file" name="image" value="">
                                                    </span>
                                                    <!-- The global file processing state -->
                                                    <span class="fileupload-process"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label class="form-label"><strong>Pagina</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                                    <?php
                                                    $arr = array();
                                                    foreach($pages as $page):
                                                        $arr[$page->id] = $page->description;
                                                    endforeach;
                                                    ?>
                                                    {{ Form::select('idPage', $arr,$actual->id) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<a class="ajax cboxElement" href="http://www.jacklmoore.com/colorbox/content/ajax.html" title="Homer Defined">Outside HTML (Ajax)</a>-->
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
    {{HTML::script("assets/admin/assets/plugins/summernote/summernote.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/dropzone/dropzone.min.js")}}
    <!--
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/tmpl.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/load-image.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/canvas-to-blob.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/jquery.blueimp-gallery.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.iframe-transport.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload-process.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload-image.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload-video.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-file-upload/js/main.js")}}
    -->
    {{HTML::script("assets/admin/assets/js/informationForm.js")}}
@stop