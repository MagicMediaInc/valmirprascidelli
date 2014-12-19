@extends("backend.dashboard_layout");

@section("maincontent")
	<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Incluir Imagens</h3>
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
                                	{{Form::hidden('idAlbum', $album->id )}}
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <label class="form-label"><strong>Titulo</strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                {{ Form::text('title', $album->title, array('id'=>'title', "class"=>"form-control"  )) }}
                                            </div>
                                        </div>
                                     </div>
                                        <div class="row">
                                            <div class="form-group col-md-8 col-sm-8 col-xs-8">
	                                            <label class="form-label"><strong>Descrição</strong></label>
	                                            <span class="tips"></span>
	                                            <div class="controls">
	                                                {{ Form::text('description', $album->description, array('id'=>'description', "class"=>"form-control" )) }}
	                                            </div> 
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                                <label class="form-label"><strong>Visible na Galeria</strong></label>
                                                <span class="tips"></span>
                                                <div class="controls">
                                                    @if($album->visible== 1 )
                                                        <input id="status" name="status" checked data-on-color="info" data-off-color="danger" type="checkbox" class="switch">
                                                    @else
                                                        <input id="status" name="status" data-on-color="info" data-off-color="danger" type="checkbox" class="switch"> 
                                                    @endif
                                                </div>
                                            </div>
                                       
                                        </div>
                    <div class="gallery config-open" id="MixItUp059369">
                    
                        @if(count($gallery))
                        <?php $pos=0; ?>
                        @foreach($gallery as $image)
                        	<?php $pos++; ?>
                            <div class="sortable mix category-1" id="{{$image->id}}" data-value="1" style="display: inline-block; margin-right:5px">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="/dashboard/gallery/edit/{{ str_replace('/','!', Hash::make( (string) $image->id ) ) }}" class="btn btn-default btn-icon btn-rounded magnific" title="Update"><i class="fa fa-pencil"></i></a>
                                            <a href="/dashboard/gallery/delete/{{ str_replace('/','!', Hash::make( (string) $image->id ) ) }}" class="btn btn-default btn-icon btn-rounded favorite" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </div>
                                    <img src=<?php $img=substr($image->description,9);echo "'".substr_replace($image->description,"small_".$img,9)."'"; ?> alt="{{$image->title}}" />
                                    <!-- <img src="{{$image->description}}" class="img-responsive" alt="{{$image->title}}" heigth="100px"> -->
                                    <div class="thumbnail-meta">
                                        <h5>{{$image->title == '' ? 'Sin Título' : $image->title}} <br><small><i class="fa fa-clock-o"></i> <span class="ago">{{$image->created_at}}</span></small></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                       
                    </div>
                    <div class="row"></div>
                                        <div class="row">
                                            <label class="form-label"><strong>Imagens</strong></label>
											<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
											<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
											<style>
											#dragandrophandler
											{
											border:2px dotted #0B85A1;
											width:100%;
											height:200px;
											color:#92AAB0;
											text-align:left;vertical-align:middle;
											padding:10px 10px 10 10px;
											margin-bottom:10px;
											font-size:200%;
											text-align: center;
											vertical-align: middle;
											padding-top: 2.5em;
											}
											.progressBar {
											    width: 200px;
											    height: 22px;
											    border: 1px solid #ddd;
											    border-radius: 5px; 
											    overflow: hidden;
											    display:inline-block;
											    margin:0px 10px 5px 5px;
											    vertical-align:top;
											}
											 
											.progressBar div {
											    height: 100%;
											    color: #fff;
											    text-align: right;
											    line-height: 22px; /* same as #progressBar height if we want text middle aligned */
											    width: 0;
											    background-color: #0ba1b5; border-radius: 3px; 
											}
											.statusbar
											{
											    border-top:1px solid #A9CCD1;
											    min-height:25px;
											    width:700px;
											    padding:10px 10px 0px 10px;
											    vertical-align:top;
											}
											.statusbar:nth-child(odd){
											    background:#EBEFF0;
											}
											.filename
											{
											display:inline-block;
											vertical-align:top;
											width:250px;
											}
											.filesize
											{
											display:inline-block;
											vertical-align:top;
											color:#30693D;
											width:100px;
											margin-left:10px;
											margin-right:5px;
											}
											.abort{
											    background-color:#A8352F;
											    -moz-border-radius:4px;
											    -webkit-border-radius:4px;
											    border-radius:4px;display:inline-block;
											    color:#fff;
											    font-family:arial;font-size:13px;font-weight:normal;
											    padding:4px 15px;
											    cursor:pointer;
											    vertical-align:top;

											    }
											</style>
											<div id="dragandrophandler">Drag & Drop Files Here</div>
											<br><br>
											<div id="status1"></div>
											<script>
											function sendFileToServer(formData,status)
											{
												console.log(formData);
												var idAlbum = $('input[name=idAlbum]').val();
												//formData.idAlbum = idAlbum;
											    var uploadURL ="/gallery/add"; //Upload URL
											    var extraData ={
											    	'idAlbum': idAlbum
											    }; //Extra Data.
											    var jqXHR=$.ajax({
										            xhr: function() {
										            var xhrobj = $.ajaxSettings.xhr();
										            if (xhrobj.upload) {
									                    xhrobj.upload.addEventListener('progress', function(event) {
									                        var percent = 0;
									                        var position = event.loaded || event.position;
									                        var total = event.total;
									                        if (event.lengthComputable) {
									                            percent = Math.ceil(position / total * 100);
									                        }
									                        //Set progress
									                        status.setProgress(percent);
										                    }, false);
										                }
										            return xhrobj;
											        },
											    url: uploadURL,
											    type: "POST",
											    contentType:false,
											    processData: false,
    											//contentType: 'multipart/form-data',
											        cache: false,
											        data: formData,
											        success: function(data){
											        	console.log(data);
											        	if(data.error){
											            	status.setProgress(0);
											           		$("#status1").append("Failed to upload Image");  
											        	}
											        	else{
												            status.setProgress(100);
												            $("#status1").append('<img src="'+data.url+'" width="150px" style="margin:1em"/>');         
												        }
											        }
											    }); 
											 
											    status.setAbort(jqXHR);
											}
											 
											var rowCount=0;
											function createStatusbar(obj)
											{
											     rowCount++;
											     var row="odd";
											     if(rowCount %2 ==0) row ="even";
											     this.statusbar = $("<div class='statusbar "+row+"'></div>");
											     this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
											     this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
											     this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
											     this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
											     obj.after(this.statusbar);
											 
											    this.setFileNameSize = function(name,size)
											    {
											        var sizeStr="";
											        var sizeKB = size/1024;
											        if(parseInt(sizeKB) > 1024)
											        {
											            var sizeMB = sizeKB/1024;
											            sizeStr = sizeMB.toFixed(2)+" MB";
											        }
											        else
											        {
											            sizeStr = sizeKB.toFixed(2)+" KB";
											        }
											 
											        this.filename.html(name);
											        this.size.html(sizeStr);
											    }
											    this.setProgress = function(progress)
											    {       
											        var progressBarWidth =progress*this.progressBar.width()/ 100;  
											        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
											        if(parseInt(progress) >= 100)
											        {
											            this.abort.hide();
											        }
											    }
											    this.setAbort = function(jqxhr)
											    {
											        var sb = this.statusbar;
											        this.abort.click(function()
											        {
											            jqxhr.abort();
											            sb.hide();
											        });
											    }
											}
											function handleFileUpload(files,obj)
											{
											   for (var i = 0; i < files.length; i++) 
											   {
											        var fd = new FormData();
											        fd.append('file', files[i]);
											        fd.append('idAlbum', $('input[name=idAlbum]').val());
											 
											        var status = new createStatusbar(obj); //Using this we can set progress.
											        status.setFileNameSize(files[i].name,files[i].size);
											        sendFileToServer(fd,status);
											 
											   }
											}
											$(document).ready(function()
											{

												$("#MixItUp059369").sortable({
													connectWith: '#sortable',
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
														 // 	data.push(key[i]=imgid[i]);
														 // };
														 console.log(data);
														 $.ajax({
														 	url: '/dashboard/albums/order',
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
												});
											var obj = $("#dragandrophandler");
											obj.on('dragenter', function (e) 
											{
											    e.stopPropagation();
											    e.preventDefault();
											    $(this).css('border', '2px solid #0B85A1');
											});
											obj.on('dragover', function (e) 
											{
											     e.stopPropagation();
											     e.preventDefault();
											});
											obj.on('drop', function (e) 
											{
											 
											     $(this).css('border', '2px dotted #0B85A1');
											     e.preventDefault();
											     var files = e.originalEvent.dataTransfer.files;
											 
											     //We need to send dropped files to Server
											     handleFileUpload(files,obj);
											});
											$(document).on('dragenter', function (e) 
											{
											    e.stopPropagation();
											    e.preventDefault();
											});
											$(document).on('dragover', function (e) 
											{
											  e.stopPropagation();
											  e.preventDefault();
											  obj.css('border', '2px dotted #0B85A1');
											});
											$(document).on('drop', function (e) 
											{
											    e.stopPropagation();
											    e.preventDefault();
											});
											 
											});
											</script>
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