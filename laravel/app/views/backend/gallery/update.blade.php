@extends("backend.dashboard_layout");

@section("maincontent")
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ingresar Título</h3>
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
                                	{{Form::hidden('idAlbum', $gallery->id )}}
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <label class="form-label"><strong>Titulo</strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                {{ Form::text('title', $gallery->title == '' ? 'Sin título' : $gallery->title, array('id'=>'title', "class"=>"form-control"  )) }}
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top:1em;">
			                            <div class="mix category-1 col-xs-12" data-value="1" style="display: inline-block;">
			                                <div class="thumbnail">
			                                    <img src="{{$gallery->description}}" class="img-responsive" alt="{{$gallery->title}}" heigth="100px">
			                                </div>
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
    {{HTML::script("assets/admin/assets/plugins/moment/moment.js")}}
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
    {{HTML::script("assets/admin/assets/js/gallery.js")}}
    {{HTML::script("assets/admin/assets/js/informationForm.js")}}
@stop