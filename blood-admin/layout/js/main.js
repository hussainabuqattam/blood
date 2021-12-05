$(function() {
  $('body').on('click', '.page-scroll a', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
          scrollTop: $($anchor.attr('href')).offset().top
      }, 1500, 'easeInOutExpo');
      event.preventDefault();
  });
});

// Floating label headings for the contact form
$(function() {
  $("body").on("input propertychange", ".floating-label-form-group", function(e) {
      $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
  }).on("focus", ".floating-label-form-group", function() {
      $(this).addClass("floating-label-form-group-with-focus");
  }).on("blur", ".floating-label-form-group", function() {
      $(this).removeClass("floating-label-form-group-with-focus");
  });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
  target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
  $('.navbar-toggle:visible').click();
});
//img-upload
let picturePreview = document.querySelector(".imagePreview");
let actionButton = document.querySelector(".action-button");
let fileInput = document.querySelector("input[name='fileInput']");
let fileReader = new FileReader();

const DEFAULT_IMAGE_SRC = "https://www.drupal.org/files/profile_default.png";

actionButton.addEventListener("click", () => {
if ( picturePreview.src !== DEFAULT_IMAGE_SRC ) {
  resetImage();
} else {
  fileInput.click();
}
});

fileInput.addEventListener("change", () => {
refreshImagePreview();
});

function resetImage() {
setActionButtonMode("upload");
picturePreview.src = DEFAULT_IMAGE_SRC;
fileInput.value = "";
}

function setActionButtonMode(mode) {
let modes = {
  "upload": function() {
    actionButton.innerText = "Upload image";
    actionButton.classList.remove("mode-remove");
    actionButton.classList.add("mode-upload");
  },
  "remove": function() {
    actionButton.innerText = "Remove image";
    actionButton.classList.remove("mode-upload");
    actionButton.classList.add("mode-remove");
  }
}
return (modes[mode]) ? modes[mode]() : console.error("unknown mode");
}

function refreshImagePreview() {
if ( picturePreview.src !== DEFAULT_IMAGE_SRC ) {
  picturePreview.src = DEFAULT_IMAGE_SRC;
} else {
  if ( fileInput.files && fileInput.files.length > 0 ){
    fileReader.readAsDataURL(fileInput.files[0]);
    fileReader.onload = (e) => {
      picturePreview.src = e.target.result;
      setActionButtonMode("remove");
    }
  }
}
}

refreshImagePreview();