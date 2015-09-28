<link rel="icon" type="image/png" href="../crumpocolypse/img/tinylogo16.png">
<!-- jquery nonsense -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="../crumpocolypse/easing.js"></script>
<script type="text/javascript" src="../crumpocolypse/jquery.autosize-min.js"></script>
<script type="text/javascript" src="../crumpocolypse/effects.js"></script>
<script src="../crumpocolypse/respond.min.js"></script>	
<!-- CSS -->
<link type="text/css" rel="stylesheet" href="../crumpocolypse/cool-style-admin.css" />

<script src="../crumpocolypse/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.on( 'instanceCreated', function( event ) {
		var editor = event.editor,
		element = editor.element;

		// Customize the editor configurations on "configLoaded" event,
		// which is fired after the configuration file loading and
		// execution. This makes it possible to change the
		// configurations before the editor initialization takes place.
		editor.on( 'configLoaded', function() {
				
			// Remove unnecessary plugins to make the editor simpler.
			editor.config.removePlugins = 'newpage,colorbutton,font,' +
				'smiley,specialchar,templates';
			
			//SCAYT auto on
			editor.config.scayt_autoStartup = true;
		});
	});
</script>
								
<meta name="viewport" content="width=device-width">

