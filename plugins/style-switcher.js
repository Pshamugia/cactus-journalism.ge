jQuery(document).ready(function($) {
	
		// Color Changer
		$("#preset1" ).click(function(){
			Cookies.set('active_style', "css/presets/preset1.css");			
			$("#style-switch").attr("href", "css/presets/preset1.css" );
			return false;
		});
		$("#preset2" ).click(function(){
			Cookies.set('active_style', "css/presets/preset2.css");
			$("#style-switch").attr("href", "css/presets/preset2.css" );
			return false;
		});
		$("#preset3" ).click(function(){
			Cookies.set('active_style', "css/presets/preset3.css");
			$("#style-switch").attr("href", "css/presets/preset3.css" );
			return false;
		});
		$("#preset4" ).click(function(){
			Cookies.set('active_style', "css/presets/preset4.css");
			$("#style-switch").attr("href", "css/presets/preset4.css" );
			return false;
		});
		$("#preset5" ).click(function(){
			Cookies.set('active_style', "css/presets/preset5.css");
			$("#style-switch").attr("href", "css/presets/preset5.css" );
			return false;
		});
		$("#preset6" ).click(function(){
			Cookies.set('active_style', "css/presets/preset6.css");
			$("#style-switch").attr("href", "css/presets/preset6.css" );
			return false;
		});

});