
$(document).ready(function() {

// if delete
$("#taskdelete").on("submit", function(e) {
    e.preventDefault();

    // get the value of the radio button
    var destroy = $('input[name=destroy]:checked', '#taskdelete').val();
    // uncheck both radio buttons
    yes.checked = false;
    no.checked = false;
    // get the value of the id from hidden field
    var id = $('#id').val();
    // empty the id value
    $('#id').val('');

    if (destroy !== "yes") {
        // replace form with paragraph
        $( "#inner_content" ).html("<p class='announce'>The record was not deleted.</p>");
    } else {
        var dataString = 'id=' + id;

    	$.ajax({
    		url:  "delete.php",
    		type: "POST",
    		data: dataString,
    		success: function() {
                $( "#inner_content" ).html("<p class='announce'>The record has been deleted.</p>");
                console.log("Success!");
            },
            error: function (jqXHR, status, err) {
                console.log("Error!");
            }
        });
    }
});

// if update
$("#taskupdate").on("submit", function(e) {

	$.ajax({
		url:  "update.php",
		type: "POST",
		data: $(this).serialize(),
		success: function() {
            console.log("Success!");
        },
        error: function (jqXHR, status, err) {
            console.log("Error!");
        }
    });

});

}); // close document ready