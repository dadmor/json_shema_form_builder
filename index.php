<html>
  <head>
    <meta charset="utf-8" />
    <title>Getting started with JSON Form</title>
   <link rel="stylesheet" style="text/css" href="css/bootstrap.css" />
  </head>
  <body>

  <script type="text/javascript" src="js/jquery.1.11.1.min.js"></script>

  <script type="text/javascript" src="js/lodash.js"></script>
  <script type="text/javascript" src="js/lodash-deep.js"></script>

  <script type="text/javascript" src="js/form-builder.js"></script>

  <script type="text/javascript" src="form-system-libs/jsonform/opt/jsv.js"></script>
  <script type="text/javascript" src="form-system-libs/jsonform/jsonform.js"></script>
  <style>

    #main_form{
      border:1px solid #ccc; 
    }

    #options{
      width:100%;
      top:0;
      left:500px;
      background-color:#fff;
      position:absolute;
      border:1px solid #ccc; 
      padding:10px;
      -webkit-transition-property: right, left; /* Safari */
      -webkit-transition-duration: 0.6s; /* Safari */
    }

    #main_form .control-group{
      margin-top:1px !important;
      margin-bottom:0px !important;
      outline: #ccc solid 1px;
    }
    #main_form fieldset{
      margin-left:10px !important;
    }
    #main_form fieldset.selected{
        border-left:10px solid #bbb;
        margin-left:0px !important;
    }
    #main_form .controls{
      display:none;
    }
    #main_form legend{
      border:none !imoprtant;
      border-left:10px solid #bbb;
      margin:-1px !important; 
      margin-left:-10px !important;
      font-size:14px;
      line-height:20px;
      padding:10px;
      background:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAKElEQVQIW2NkQANnzpz5z4gsBhIwMTFhhAvCBECKwILIAmBBdAGQIADcqBNp/ahu1gAAAABJRU5ErkJggg==');
      
/*background-color:#ccc; 
      color:#fff;*/

    }
    #main_form label{
      margin:0px !important;
      line-height:20px;

      padding:10px;  
    }
    </style>

<div style="max-width:650px">

  <div style="position:relative">
    <form id="main_form"></form>
    <div id="options"></div>
  </duv>

  <div style="position:relative">
    <button class="btn btn-primary add_element" style="width:100%; margin-bottom:5px" data-name="string"> add element </button>
    <button class="btn btn-primary add_element" style="width:100%; margin-bottom:5px" data-name="object"> container </button>
  </div>

</div>

  <script type="text/javascript">

      // default form data to init
      var t = {
      "schema": {}
      };
     
      // define json loaded callbacks
      var loader_calback = {
        'fields' : function(data){
          _UXFORM.add_object(data);
        },
        'options' : function(data){
          $('#options').css('left','0px');
          $('#options').jsonForm(data);
        }
      }

      // init form builder and load data
     _UXFORM.load_data(t);

      // mouse events //

      // add elements button
      $('.add_element').click(function(){
        _UXFORM.load_json('fields','json/fields/'+$(this).attr('data-name')+'.json');

      })

      // pointer on container
      $(document).on( "click", "fieldset", function(e) { 
        e.stopPropagation();
        _UXFORM.create_pointer($(this));

        $('fieldset').removeClass('selected');
        $(this).addClass('selected');

      });

      // display options form
      $(document).on( "click", "label", function(e) { 
        e.stopPropagation();
        var schema_path = _UXFORM.create_path( $(this) );
        var type = _UXFORM.get_type( schema_path );
        _UXFORM.load_json('options','json/options/'+type+'.json');
      });

      // render main builder 
      var render = function(){
        $('#main_form').children().remove();
        $('#main_form').jsonForm(t);

      }
      render();

      //$('.control-group ').css('border','1px solid red');
      //$('input').css('display','none');
  </script>
