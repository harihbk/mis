$('.show').zoomImage();
$('.show-small-img:first-of-type').css({'border': 'solid 1px #951b25', 'padding': '2px'})
$('.show-small-img:first-of-type').attr('alt', 'now').siblings().removeAttr('alt')
$('.show-small-img').click(function () {
  $('#show-img').attr('src', $(this).attr('src'))
  $('#big-img').attr('src', $(this).attr('src'))
  $(this).attr('alt', 'now').siblings().removeAttr('alt')
  $(this).css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  if ($('#small-img-roll').children().length > 4) {
    if ($(this).index() >= 3 && $(this).index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(this).index() - 2) * 76 + 'px')
    } else if ($(this).index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
})
// 点击 '>' 下一张
$('#next-img').click(function (){
  $('#show-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
  $('#big-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
  $(".show-small-img[alt='now']").next().css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  $(".show-small-img[alt='now']").next().attr('alt', 'now').siblings().removeAttr('alt')
  if ($('#small-img-roll').children().length > 4) {
    if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
    } else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
})
// 点击 '<' 上一张
$('#prev-img').click(function (){
  $('#show-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
  $('#big-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
  $(".show-small-img[alt='now']").prev().css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
  $(".show-small-img[alt='now']").prev().attr('alt', 'now').siblings().removeAttr('alt')
  if ($('#small-img-roll').children().length > 4) {
    if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
      $('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
    } else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
      $('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
    } else {
      $('#small-img-roll').css('left', '0')
    }
  }
})
function getQuote() {
  var servicesValue = $('[name="quoteselect"]').val();
  if (!servicesValue) {
    $("#serviceError").slideDown();
  }

  const getquotename = $('[name="quotename"]').val() || undefined;
  const getquoteemail = $('[name="quoteemail"]').val() || undefined;
  const getquotetel = $('[name="quotetel"]').val() || undefined;
  const getquotezipcode = $('[name="quotezipcode"]').val() || undefined;
  const getquoteselect = $('[name="quoteselect"]').val() || undefined;
  const getquotecontent = $('[name="quotecontent"]').val() || undefined;

  if (
    getquotename &&
    getquoteemail &&
    getquotetel &&
    getquotezipcode &&
    getquoteselect &&
    getquotecontent
  ) {
      $("#commonError").addClass("hide");
      $('#quoteSubmit').submit();
  } else {
    $("#commonError").removeClass("hide");
  }
}
var validation = function (name, elementValue) {
  switch (name) {
    case "email":
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      return emailPattern.test(elementValue);
      break;

    case "onlyalphabet":
      var onlyAlphabetPattern = /^[a-zA-Z ]*$/;
      return onlyAlphabetPattern.test(elementValue);
      break;

    case "onlynumber":
      var onlynumberPattern = /^[0-9]+$/;
      return onlynumberPattern.test(elementValue);
      break;

    case "phonenumber":
      var phonenumberPattern = /^[0-9]{10}$/;
      return phonenumberPattern.test(elementValue);
      break;

    case "services":
      var servicesPattern = /^[a-zA-Z ]*$/;
      return servicesPattern.test(elementValue);
      break;

    case "onlyalphabet2":
      var onlyalphabetPattern2 = /^[a-zA-Z ]*$/;
      return onlyalphabetPattern2.test(elementValue);
      break;
  }
};
// Adding class to error display
function addErrorHide(name) {
  setTimeout(() => {
    $(name).addClass("display-hide");
    $(name).removeAttr("style");
  }, 500);
}
// Event handler on keyup for fome index get quotes fields
$(document).on("keyup", ".checkValidation", function () {
  console.log('$(this).attr("name") ', $(this).attr("name"));
  switch ($(this).attr("name")) {
    case "quotename":
      var nameValue = $('[name="quotename"]').val();
      var nameValidity = validation("onlyalphabet", nameValue);
      if (nameValidity && nameValue !== "") {
        $("#quotenameError").slideUp();
        addErrorHide("#quotenameError");
      }
      break;
    case "quoteemail":
      var emailValue = $('[name="quoteemail"]').val();
      var emailValidity = validation("email", emailValue);
      if (emailValidity) {
        $("#emailError").slideUp();
        addErrorHide("#emailError");
      }
      break;
    case "quotetel":
      var telValue = $('[name="quotetel"]').val();
      var telValidity = validation("phonenumber", telValue);
      if (telValidity && telValue !== "") {
        $("#phoneNumberError").slideUp();
        addErrorHide("#phoneNumberError");
      }
      break;
    case "quotezipcode":
      var zipcodeValue = $('[name="quotezipcode"]').val();
      var zipcodeValidity = validation("onlynumber", zipcodeValue);
      if (zipcodeValidity) {
        $("#zipcodeError").slideUp();
        addErrorHide("#zipcodeError");
      }
      break;

    //   case "quoteselect":
    //   var servicesValue = $('[name="quoteselect"]').val();
    //   if (servicesValue) {
    //     $("#ServiceErrorError").slideUp();
    //     addErrorHide("#ServiceError");
    //   }
    //   break;
    case "quotecontent":
      var servicesValue = $('[name="quotecontent"]').val();
      var servicesValidity = validation("services", servicesValue);
      if (servicesValidity) {
        $("#ServiceErrorError").slideUp();
        addErrorHide("#ServiceErrorError");
      }
      break;
  }
});
// Event handler on focusout for fome index and contact get quotes fields
$(document).on("change", '[name="quoteselect"]', function () {
  $("#serviceError").slideUp();
});

// Event handler on focusout for fome index and contact get quotes fields
$(document).on("focusout", ".checkValidation", function () {
  console.log('$(this).attr("name") focusout ', $(this).attr("name"));
  switch ($(this).attr("name")) {
    case "quotename":
      var nameValue = $('[name="quotename"]').val();
      var nameValidity = validation("onlyalphabet", nameValue);
      if (nameValidity && nameValue === "") {
        $("#quotenameError").slideDown();
      }
      break;
    case "quoteemail":
      var emailValue = $('[name="quoteemail"]').val();
      var emailValidity = validation("email", emailValue);
      if (!emailValidity) {
        $("#emailError").slideDown();
      }
      break;
    case "quotetel":
      var telValue = $('[name="quotetel"]').val();
      var telValidity = validation("phonenumber", telValue);
      if (!telValidity) {
        $("#phoneNumberError").slideDown();
      }
      break;

    case "quotezipcode":
      var zipcodeValue = $('[name="quotezipcode"]').val();
      var zipcodeValidity = validation("onlynumber", zipcodeValue);
      console.log("zipcodeValidity", zipcodeValidity);
      if (!zipcodeValidity) {
        $("#zipcodeError").slideDown();
      }
      break;

    case "quoteselect":
      var servicesValue = $('[name="quoteselect"]').val();
      var servicesValidity = validation("services", servicesValue);
      console.log("servicesValidity", servicesValidity);
      if (!servicesValidity) {
        $("#serviceError").slideDown();
      }
      break;
  }
});