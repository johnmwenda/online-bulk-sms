</div>
<!-- <script type="text/javascript" src="js/scripts.min.js"></script> -->
<script>
	var checkboxes = $("input[type='checkbox']"),
    submitButt = $("input[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
		if( checkboxes.is(":checked")==true){
			submitButt.attr("style", "color:red;width:60px");
		}
		if(checkboxes.is(":checked")==false){
			submitButt.attr("style", "color:#808080;width:60px");
		}
});
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
    // Initialize Variables
    var closePopup = document.getElementById("popupclose");
    var overlay = document.getElementById("overlay");
    var popup = document.getElementById("popup");
    var button = document.getElementById("button");
    // Close Popup Event
    closePopup.onclick = function() {
        overlay.style.display = 'none';
        popup.style.display = 'none';
    };
    // Show Overlay and Popup
    button.onclick = function() {
        overlay.style.display = 'block';
        popup.style.display = 'block';
    }
</script>
<script>

    $(document).ready(function() {

        // Here is how to show an error message next to a form field

        var errorField = $('.form-input-name-row');

        // Adding the form-invalid-data class will show
        // the error message and the red x for that field

        errorField.addClass('form-invalid-data');
        errorField.find('.form-invalid-data-info').text('Please enter your name');


        // Here is how to mark a field with a green check mark

        var successField = $('.form-input-email-row');

        successField.addClass('form-valid-data');
    });

</script>
</body>
</html>