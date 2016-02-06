$(document).ready(function() {

$("#response").hide();

$("#taskform").on("submit", function(e) {
    e.preventDefault();

	$.ajax({
		url:  "enter.php",
		type: "POST",
		data: $(this).serialize(),
		success: function(html) {
            $("#tasks").hide();
            $("#response").show();
        },
        error: function (jqXHR, status, err) {
            alert("Error!");
        }
        // --- data: $(this).serialize(), ---
        // takes the form data and puts all of it into a single string
        // that the PHP script can read - requires a unique
        // NAME attribute for every form element
    });

});

}); // close document ready