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
      border:1px solid #ccc; margin:40px;
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
        border-left:10px solid #ccc;
        margin-left:0px !important;
    }
    #main_form .controls{
      display:none;
    }
    #main_form legend{
      border-left:10px solid yellow;
      margin:0px !important; 
      margin-left:-10px !important;
      font-size:14px;
      line-height:20px;
      padding:10px;
    }
    #main_form label{
      margin:0px !important;
      line-height:20px;

      padding:10px;  
    }
    </style>

  <form id="main_form"></form>
  <div style="padding:0px 40px">
  <button class="btn btn-primary add_element" style="width:100%" data-name="string">add element</button>
  <button class="btn btn-primary add_element" style="width:100%" data-name="object">container</button>
  </div>
  <script type="text/javascript">
  //console.log( "ready!" );
  var t = {
  "schema": {
    
    }
  };
      _UXFORM.load_data(t);
      // console.log($('form'));
      $('#click').click(function(){
        $('#main_form').children().remove();
        $('#main_form').jsonForm(t);
      })

      $('.add_element').click(function(){
        _UXFORM.load_json('json/fields/'+$(this).attr('data-name')+'.json');
      })

      $(document).on( "click", "fieldset", function(e) { 
        
        e.stopPropagation();
        _UXFORM.create_pointer($(this));

        $('fieldset').removeClass('selected');
        $(this).addClass('selected');



        //alert(_UXFORM.schema_pointer);
      });

       $(document).on( "click", "label", function(e) { 
        
        e.stopPropagation();
        //$('#main_form').children().remove();
        //$('#main_form')
        _UXFORM.create_path( $(this) );

        //alert(_UXFORM.schema_pointer);
      });

      var render = function(){
        $('#main_form').children().remove();
        $('#main_form').jsonForm(t);
      }
      render();
      //$('.control-group ').css('border','1px solid red');
      //$('input').css('display','none');
  </script>
