
var form = document.querySelector('form');
form.onsubmit = function () {
  // Populate hidden form on submit
  var about = document.querySelector('input[name=about]');
  about.value = JSON.stringify(quill.getContents());

  console.log("Submitted", $(form).serialize(), $(form).serializeArray());

  // No back end to actually submit to!
  alert('Open the console to see the submit data!')
  return false;
};


$('.count-content').on("change keyup paste", function() {
  let length = $(this).val().length
  $(this).parent().find("#counter").html(length);
});

$(document).ready(function () {
  $('.count-content').each(function() {
    let length = $(this).val().length;
    $(this).parent().find("#counter").html(length);
  });
});

$('.summernote').summernote()