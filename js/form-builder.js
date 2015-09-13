var _UXFORM = {
	'data' : false,
	'schema_pointer' : 'schema',
	'schema_path' : 'schema',
	'load_data' : function(data){
		this.data = data;
	},
	'create_pointer' : function(_this){
        var path = _this.attr('id').split("-");
        path = path[path.length-1];
        path = path.split(".");
        var schema_pointer = 'schema.';
        $.each(path, function( index, value ) {
          schema_pointer += value + '.properties.';
        });
        this.schema_pointer = schema_pointer.slice(0,-1);
	},
	'create_path' : function(_this){
		var path = _this.attr('for').split("-");
		path = path[path.length-1];
		try {
		    path = path.split(".");
		}catch(err) {}
        var schema_path = 'schema.';
        var length = path.length-1;
        $.each(path, function( index, value ) {
        	if(index != length){
          		schema_path += value + '.properties.';
          	}else{
          		schema_path += value;
          	}
        });
        //this.schema_path = schema_path.slice(0,-1);
        alert(schema_path+'.type');
        var type = _.deepGet(__this.data, schema_path+'.type');
        
	},
	'add_object' : function(data){
		__this = this;
		var rnd = Math.floor(Math.random() * 899999) + 100000;
		_.deepSet(__this.data, __this.schema_pointer+'.field'+rnd, data);
		//console.log('-- add_object --');
		//console.log(this.data);
		render();
	},
	'load_json' : function(path){
		__this = this; 
		var jqxhr = $.getJSON( path, function(data) {
			console.log(data);
			__this.add_object(data);
		})					
		.fail(function() { alert( "load element error" ); });
	},
	'load_options': function(path){
		var jqxhr = $.getJSON( path, function(data) {
			console.log(data);
			__this.add_object(data);
		})					
		.fail(function() { alert( "load element error" ); });
	},
	build_options_form(){

	}

}