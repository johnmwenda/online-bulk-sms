<!-- <script type="text/javascript" src="js/scripts.min.js"></script> -->
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