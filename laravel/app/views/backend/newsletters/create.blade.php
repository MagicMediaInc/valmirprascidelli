@extends("backend.dashboard_layout");
@section("maincontent")
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

.column.first {margin-bottom: 60px;}


/* Sortable items */

.sortable-list {
    background-color: #F93;
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
    background-color: #BFB;
    border: 1px dashed #666;
    height: 58px;
    margin-bottom: 5px;
}
    </style>
    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Incluir Newsletter</h3>
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
                                {{Form::open()}}
                                {{Form::hidden('content', '' ,array('id'=>'content', 'style'=>'display:none;'))}}
                                    <div class="form-group col-md-7 col-sm-7 col-xs-7">
                                        <div class="row">
                                            <label class="form-label"><strong>Descrição</strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                {{ Form::text('description', '', array('id'=>'description', "class"=>"form-control")) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label"><strong>Noticias</strong></label>
                                            <span class="tips"></span>
                                            <div class="controls">
                                                <div id="containment">
                                                    <div class="column first">
                                                        <ul id="to-save" class="sortable-list">
                                                            
                                                        </ul>
                                                    </div>
                                                    <div id="noticias" class="column">
                                                        <ul class="sortable-list">
                                                            @foreach ($informations as $information)
                                                                <li id="{{$information->id}}" class="sortable-item"><img src="{{$information->mainImage}}" class="img-responsive" style="width:10%;float:left;"> <div style="width:90%;">{{$information->description}}</div></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="clearer">&nbsp;</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-offset-1 col-md-4 col-sm-4 col-xs-4">
                                        
                                        <input id="dainfo" name="dainfo" type="hidden" class="datetimepicker" data-inline="true" style="display: none;">
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
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
                    <script type="text/javascript">
                        // $(document).on("ready",function(){

                        // })

                                    elementos=[];
                                    $('#containment .sortable-list').sortable({
                                    connectWith: '#containment .sortable-list',
                                    containment: '#containment',
                                    over: function (event, ui) {
                                        console.log($(ui.sender).attr("id"));
                                        removeIntent = false;    
                                        if ($(ui.sender).attr("id")!="to-save"){
                                            // if($(this).attr("id")=="to-save"){
                                                elementos.push(ui.item.attr("id"))
                                                $("#content").val(elementos)
                                            // }
                                        }
                                    },
                                    out: function (event, ui) {
                                        console.log(ui.sender.id);
                                        if ($(ui.sender).attr("id")=="to-save"){
                                            // if($(this)){
                                                console.log(elementos);
                                                var index = elementos.indexOf(ui.item.attr("id"))
                                                console.log(index)
                                                if (index > -1){
                                                    elementos.splice(index,1)
                                                    $("#content").val(elementos); 
                                                }  
                                                removeIntent = true;    
                                            // }
                                        }
                                    }
                                    });
                                     var dateFormat = function () {
        var    token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
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
    
@stop