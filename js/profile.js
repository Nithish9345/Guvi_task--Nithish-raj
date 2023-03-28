var editBtn = document.getElementById("edit-btn");
var inputs = document.getElementsByTagName("input");
var selects = document.getElementsByTagName("select");

function toggleEditable() {
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].readOnly = !inputs[i].readOnly;
  }
  for (var i = 0; i < selects.length; i++) {
    selects[i].disabled = !selects[i].disabled;
  }
}

editBtn.addEventListener("click", function() {
  editBtn.innerText = editBtn.innerText === "Edit" ? "Save" : "Edit";
  toggleEditable();
});
$(document).ready(function() {
    $('#submit-btn').click(function() {
      var data = $('#profile-form').serialize();
      $.ajax({
        type: 'POST',
        url: 'update_form.php', // replace with your PHP script that handles the form submission
        data: data,
        success: function(response) {
          // Reload the page to show updated user data
          location.reload();
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });
  });