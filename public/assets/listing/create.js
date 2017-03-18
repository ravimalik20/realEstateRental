$(document).ready(function () {
	var form = $("#example-advanced-form").show();

	console.log(form);
 
	form.steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
		    // Allways allow previous action even if the current form is not valid!
		    if (currentIndex > newIndex)
		    {
		        return true;
		    }
		    // Forbid next action on "Warning" step if the user is to young
		    if (newIndex === 3 && Number($("#age-2").val()) < 18)
		    {
		        return false;
		    }
		    // Needed in some cases if the user went back (clean up)
		    if (currentIndex < newIndex)
		    {
		        // To remove error styles
		        form.find(".body:eq(" + newIndex + ") label.error").remove();
		        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		    }

		    //form.validate().settings.ignore = ":disabled,:hidden";

		    //return form.valid();

			return true;
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
		    // Used to skip the "Warning" step if the user is old enough.
		    if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
		    {
		        form.steps("next");
		    }
		    // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
		    if (currentIndex === 2 && priorIndex === 3)
		    {
		        form.steps("previous");
		    }
		},
		onFinishing: function (event, currentIndex)
		{
		    form.validate().settings.ignore = ":disabled";
		    return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			$("#example-advanced-form input[name=images]").val(localStorage.getItem("images_array"));

		    $("#example-advanced-form").submit();
		}
	}).validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
		    
		}
	});

	Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone("div#myId", { url: "/listing/image/upload"});

	var images_array = [];
	localStorage.setItem("images_array", JSON.stringify(images_array));

	myDropzone.on('sending', function(file, xhr, formData){
        formData.append('_token', $("#myId input[name=_token]").val());
    });

	myDropzone.on("success", function(file, response) {
		images_array = $.parseJSON(localStorage.getItem("images_array"));
		images_array.push(response);

		localStorage.setItem("images_array", JSON.stringify(images_array));
	});
});
