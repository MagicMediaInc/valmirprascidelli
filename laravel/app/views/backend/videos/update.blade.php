@extends("backend.dashboard_layout");

@section("maincontent")
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Atualizar Vídeos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                {{Form::open()}}
                                {{ Form::hidden('idHash', Hash::make( (string) $video->id ) ) }}
                                {{Form::hidden('content', '' ,array('style'=>'display:none;','value'=>$video->content))}}
                                
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                        <label class="form-label"><strong>Titulo</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
											{{ Form::text('title', $video->title, array('id'=>'title', "class"=>"form-control")) }}
                                        </div>
                                        <label class="form-label"><strong>URL</strong></label>
                                        <span class="tips"></span>
                                        <div class="controls">
											{{ Form::text('descripcion', $video->description, array('id'=>'descripcion', "class"=>"form-control")) }}
                                        </div>
                                    
                                        <div class="row">
                                            <label class="form-label"><strong>Conteúdo </strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                <div id="content" class="summernote">
                                                    {{ $video->content }}
                                                </div>

                                                <!-- {{ Form::text('description', '', array('id'=>'description', "class"=>"form-control")) }} -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3 col-xs-3">
                                         <div class="row">
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label class="form-label"><strong>Pagina</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                                    <?php
                                                        $arr = array("Valmir Prascidelli","Programas Padilha","Programas Dilma");
                                                    ?>
                                                    {{ Form::select('categoria', $arr, $video->categoria) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                                <label class="form-label"><strong>Status</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                                   <input id="status" name="visible" data-on-color="info" data-on-text="SIM" data-off-text="NÃO" data-off-color="danger" type="checkbox" class="switch" <?php echo $video->visible == 1 ? 'checked' : '' ?>>
                                                </div>
                                            </div>
                                        </div>
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