@extends ('backend.dashboard_layout')

@section("title")
    Vídeos
@stop
    <style type="text/css">
        /*
    Stylesheet for examples by DevHeart.
    http://devheart.org/

    Article title:  jQuery: Customizable layout using drag n drop
    Article URI:    http://devheart.org/articles/jquery-customizable-layout-using-drag-and-drop/

    Example title:  1. Getting started with sortable lists
    Example URI:    http://devheart.org/examples/jquery-customizable-layout-using-drag-and-drop/1-getting-started-with-sortable-lists/index.html
*/

/*
    Alignment
------------------------------------------------------------------- */

/* Floats */

.left {float: left;}
.right {float: right;}

.clear,.clearer {clear: both;}
.clearer {
    display: block;
    font-size: 0;
    height: 0;
    line-height: 0;
}


/*
    Example specifics
------------------------------------------------------------------- */

.column.last {margin-bottom: 40px;}
.column.first {margin-bottom: 10px;}


/* Sortable items */

.sortable-list {
    background-color: #c75757;
    list-style: none;
    margin: 0;
    min-height: 60px;
    padding: 10px;
}
.sortable-item {
    background-color: #FFF;
    border: 1px solid #000;
    cursor: move;
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    padding: 20px 0;
    text-align: center;
}

/* Containment area */


/* Item placeholder (visual helper) */

.placeholder {
    background-color: #222;
    border: 1px dashed #666;
    height: 58px;
    margin-bottom: 5px;
}
.label-title{
    display: inline;
    padding: .5em .6em .3em;
    font-size: 12pt;
    font-weight: bold;
    line-height: 1;
    color: #303030;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
    padding-bottom: 2em;
}
div.column:has(> span.label-title) {
    margin-bottom: 2em;
}

    </style>
@section("maincontent")
  <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Vídeos</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-red">
                            <h3 class="panel-title"><strong>Vídeos</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <div class="btn-group">
                                            {{HTML::link("dashboard/videos/create","Incluir Video", array("class"=>"btn btn-danger fa fa-plus "))}} 
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                    <div class="controls">
                                        <div id="containment">
                                            <div class="column first">
                                                <span class="label-title">Vídeos para ordenação</span>
                                            </div>
                                            <div class="column last">
                                                <ul id="disordered" class="sortable-list disordered">
                                                    @foreach ($videos as $video)
                                                        <li id="{{$video->id}}" class="sortable-item">
                                                            <div style="float:left;width:65%;padding-left:3em;text-align:left;">
                                                                <div style="width:90%;text-transform:uppercase;">{{$video->title}}</div>
                                                                <div style="width:90%;text-transform:uppercase;font-weight:lighter">
                                                                    @if ($video->categoria==0)
                                                                        <td>Valmir Prascidelli</td>
                                                                    @elseif($video->categoria==1)
                                                                        <td>Programas Padilha</td>
                                                                    @elseif($video->categoria==2)
                                                                        <td>Programas Dilma</td>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div style="float:left;width:15%;padding-left:3em;text-align:left;">
                                                                <div style="font-weight:lighter"><img width="120px" src="http://img.youtube.com/vi/<?php echo substr(strstr($video->description, 'watch?v='),8); ?>/0.jpg"(></div>
                                                            </div>
                                                            <div style="float:left;width:15%;padding-left:3em;text-align:left;">
                                                                {{HTML::link("dashboard/videos/update/".str_replace('/', '!', Hash::make( (string) $video->id )), "  Edição",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}}     {{HTML::link("dashboard/videos/delete/".str_replace('/', '!', Hash::make( (string) $video->id )), "  Deletar",["class"=>"delete btn btn-danger fa fa-times-circle"])}}
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="column first">
                                                <span class="label-title">Vídeos Arganizados</span>
                                            </div>
                                            <div id="noticias" class="column last">
                                                <ul id="ordered" class="sortable-list">
                                                    @foreach ($ordenados as $ordenado)
                                                        <li id="{{$ordenado->id}}" class="sortable-item">
                                                            <div style="float:left;width:65%;padding-left:3em;text-align:left;">
                                                                <div style="width:90%;text-transform:uppercase;">{{$ordenado->title}}</div>
                                                                <div style="width:90%;text-transform:uppercase;font-weight:lighter">
                                                                    @if ($ordenado->categoria==0)
                                                                        <td>Valmir Prascidelli</td>
                                                                    @elseif($ordenado->categoria==1)
                                                                        <td>Programas Padilha</td>
                                                                    @elseif($ordenado->categoria==2)
                                                                        <td>Programas Dilma</td>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div style="float:left;width:15%;padding-left:3em;text-align:left;">
                                                                <div style="font-weight:lighter"><img width="120px" src="http://img.youtube.com/vi/<?php echo substr(strstr($ordenado->description, 'watch?v='),8); ?>/0.jpg"(></div>
                                                            </div>
                                                            <div style="float:left;width:15%;padding-left:3em;text-align:left;">
                                                                {{HTML::link("dashboard/videos/update/".str_replace('/', '!', Hash::make( (string) $ordenado->id )), "  Edição",["class"=>"edit btn btn-dark fa fa-pencil-square-o"])}}     {{HTML::link("dashboard/videos/delete/".str_replace('/', '!', Hash::make( (string) $ordenado->id )), "  Deletar",["class"=>"delete btn btn-danger fa fa-times-circle"])}}
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="clearer">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->


        </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<script type="text/javascript">
                        // $(document).on("ready",function(){

                        // })

    //elementos=[@foreach($ordenados as $ordenado) {{$ordenado->id.','}} @endforeach];
    start_position = null;
    $('#containment .sortable-list').sortable({
        connectWith: '#containment .sortable-list',
        containment: '#containment',
        /*out: function (event, ui) {
            console.log(ui);
            if ($(ui.sender).attr("id")=="to-save"){
                // if($(this)){
                    console.log(elementos);
                    var index = elementos.indexOf(ui.item.attr("id"));
                    console.log(index);
                    if (index > -1){
                        elementos.splice(index,1)
                        $("#content").val(elementos); 
                    }  
                    removeIntent = true;    
                // }
            }
        },*/
        /*change: function(event, ui){
            console.log("Change");
        },*/
        /*recieve: function(event, ui){
            console.log("Recieve");
        },
        sort: function(event, ui){
            console.log("Sort");
        },*/
        start: function (event, ui){
            var data = {
                'index': ui.item.index(),
                'id': ui.item.attr("id")
            };
            start_position = data.index;
            console.log("Arrastrando el Video " + data.id + " en la posicion " + data.index);
        },
        stop: function(event, ui){
            //console.log("Stop");
            var data = {
                'index': ui.item.index(),
                'id': ui.item.attr("id"),
                'start': start_position
            };
            //var index = ui.item.index();
            //var element_id = ui.item.attr("id");
            if ($(ui.item).parent().attr("id")=="ordered"){
                console.log("Ordenando el Video " + data.id + " en la posicion " + data.index );
                console.log(ui);
                $.ajax({
                    url: '/dashboard/videos/ordervideo',
                    method: 'POST',
                    data: data,
                    success: function (data){
                        start_position = null;
                        console.log(data);
                    },
                    error: function (e){
                        console.log(e);
                    }
                });
                // if($(this)){
                /*    console.log(elementos);
                    var index = elementos.indexOf(ui.item.attr("id"));
                    console.log(index);
                    if (index > -1){
                        elementos.push(index,1)
                        $("#content").val(elementos); 
                    }  
                    removeIntent     = true;    */
                // }
            }
            else if($(ui.item).parent().attr("id")=="disordered"){
                console.log("Desordenando el Video " + data.id);
                $.ajax({
                    url: '/dashboard/videos/disordervideo',
                    method: 'POST',
                    data: data,
                    success: function (data){
                        start_position = null;
                        console.log(data);
                    },
                    error: function (e){
                        console.log(e);
                    }
                });
            }
            else{
                console.log("ERROR en la seleccion del ID de lista");
            }
        }
    });

    var dateFormat = function () {
        var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
            timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
            timezoneClip = /[^-+\dA-Z]/g,
            pad = function (val, len) {
                val = String(val);
                len = len || 2;
                while (val.length < len) val = "0" + val;
                return val;
            };
    
        // Regexes and supporting functions are cached through closure
        return function (date, mask, utc) {
            var dF = dateFormat;
    
            // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
            if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
                mask = date;
                date = undefined;
            }
    
            // Passing date through Date applies Date.parse, if necessary
            date = date ? new Date(date) : new Date;
            if (isNaN(date)) throw SyntaxError("invalid date");
    
            mask = String(dF.masks[mask] || mask || dF.masks["default"]);
    
            // Allow setting the utc argument via the mask
            if (mask.slice(0, 4) == "UTC:") {
                mask = mask.slice(4);
                utc = true;
            }
    
            var    _ = utc ? "getUTC" : "get",
                d = date[_ + "Date"](),
                D = date[_ + "Day"](),
                m = date[_ + "Month"](),
                y = date[_ + "FullYear"](),
                H = date[_ + "Hours"](),
                M = date[_ + "Minutes"](),
                s = date[_ + "Seconds"](),
                L = date[_ + "Milliseconds"](),
                o = utc ? 0 : date.getTimezoneOffset(),
                flags = {
                    d:    d,
                    dd:   pad(d),
                    ddd:  dF.i18n.dayNames[D],
                    dddd: dF.i18n.dayNames[D + 7],
                    m:    m + 1,
                    mm:   pad(m + 1),
                    mmm:  dF.i18n.monthNames[m],
                    mmmm: dF.i18n.monthNames[m + 12],
                    yy:   String(y).slice(2),
                    yyyy: y,
                    h:    H % 12 || 12,
                    hh:   pad(H % 12 || 12),
                    H:    H,
                    HH:   pad(H),
                    M:    M,
                    MM:   pad(M),
                    s:    s,
                    ss:   pad(s),
                    l:    pad(L, 3),
                    L:    pad(L > 99 ? Math.round(L / 10) : L),
                    t:    H < 12 ? "a"  : "p",
                    tt:   H < 12 ? "am" : "pm",
                    T:    H < 12 ? "A"  : "P",
                    TT:   H < 12 ? "AM" : "PM",
                    Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                    o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                    S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
                };
    
            return mask.replace(token, function ($0) {
                return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
            });
        };
    }();
    
    // Some common format strings
    dateFormat.masks = {
        "default":      "ddd mmm dd yyyy HH:MM:ss",
        shortDate:      "m/d/yy",
        mediumDate:     "mmm d, yyyy",
        longDate:       "mmmm d, yyyy",
        fullDate:       "dddd, mmmm d, yyyy",
        shortTime:      "h:MM TT",
        mediumTime:     "h:MM:ss TT",
        longTime:       "h:MM:ss TT Z",
        isoDate:        "yyyy-mm-dd",
        isoTime:        "HH:MM:ss",
        isoDateTime:    "yyyy-mm-dd' 'HH:MM:ss",
        isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
    };
    
    // Internationalization strings
    dateFormat.i18n = {
        dayNames: [
            "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
            "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
        ],
        monthNames: [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ]
    };
    
    // For convenience...
    Date.prototype.format = function (mask, utc) {
        return dateFormat(this, mask, utc);
    };
    var now = new Date();
    dateFormat(now,"isoDateTime");
    console.log(dateFormat(now,"isoDateTime"));
    $("#dainfo").val(dateFormat(now,"isoDateTime"));
</script>

@stop

@section("plugins")
  {{HTML::script("assets/admin/assets/plugins/bootstrap-switch/bootstrap-switch.js")}}
  {{HTML::script("assets/admin/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.bootstrap.js")}}
  {{HTML::script("assets/admin/assets/plugins/datatables/dataTables.tableTools.js")}}
  {{HTML::script("assets/admin/assets/js/table_editable.js")}}
@stop