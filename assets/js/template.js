jQuery(document).ready(function($) {

	$(".headroom").headroom({
		"tolerance": 20,
		"offset": 50,
		"classes": {
			"initial": "animated",
			"pinned": "slideDown",
			"unpinned": "slideUp"
		}
	});

	$("#profileImage").click(function(e){
		$("#imageUpload").click();	
	});

	$("#father").click(function(e){
		$('select option[value=\'father\']').attr('selected', 'selected');
	});

	$("#mother").click(function(e){
		$('select option[value=\'mother\']').attr('selected', 'selected');
	});

	$("#self").click(function(e){
		$('select option[value=\'self\']').attr('selected', 'selected');
	});

	
});


function fasterPreview(uploader) {
	if(uploader.files && uploader.files[0]){
		$("#profileImage").attr('src', window.URL.createObjectURL(uploader.files[0]));
	}
}

$("#imageUpload").change(function(){
	fasterPreview(this);
});
