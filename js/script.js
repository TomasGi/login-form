// defaults
function _(query) {
  return document.querySelector(query)
}
function _all(query) {
  return document.querySelectorAll(query)
}
// ////////////////////////////////////////

// toggle fullscreen
var elem = document.getElementById("info");
var videoElement = document.querySelector('body')

function toggleFullScreen() {
  if (!document.mozFullScreen && !document.webkitFullScreen) {
    if (videoElement.mozRequestFullScreen) {
      videoElement.mozRequestFullScreen();
    } else {
      videoElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else {
      document.webkitCancelFullScreen();
    }
  }
}

elem.addEventListener('click', function () {
  toggleFullScreen();
})
// ////////////////////////////////

// toggle main-menu
const menuToggles = _all('.can-toggle-menu')
function toggleMainmenu() {
  console.log('toggling main menu')
  let menu = _('.main-menu')
  let background = _('.background-fixed')
  let body = _('body')
  menu.classList.toggle('off')
  body.classList.toggle('run')
  background.classList.toggle('run')
}

menuToggles.forEach(toggle => toggle.addEventListener('click', function () {
  toggleMainmenu()
}))
// ////////////////////////////////////////

// toggle signUp form
const signupToggles = _all('.can-toggle-signup')

function toggleSignup() {
  console.log('toggling signup')
  let signupForm = _('.signup-form')
  let background = _('.background-fixed')
  signupForm.classList.toggle('run')
  background.classList.toggle('run')
}

signupToggles.forEach(toggle => toggle.addEventListener('click', function () {
  toggleSignup()
}))
// ////////////////////////////////////////

// toggles terms and conditions
const termsToggles = _all('.can-toggle-terms')

function toggleTerms() {
  console.log('toggling terms')
  let termsForm = _('.terms-conditions')
  termsForm.classList.toggle('run')
}

termsToggles.forEach(toggle => toggle.addEventListener('click', function () {
  toggleTerms()
}))
// ////////////////////////////////////////

// toggles password info
const pswinfoToggles = _all('.can-toggle-pswinfo')

function togglePswinfo() {
  console.log('toggling pswinfo')
  let infoBox = _('.info-box')
  let infoBackground = _('.info-background')
  infoBackground.classList.toggle('run')
  infoBox.classList.toggle('run')
}

pswinfoToggles.forEach(toggle => toggle.addEventListener('click', function () {
  togglePswinfo()
}))
// ////////////////////////////////////////

// toggles forgot my password
const forgotpswToggles = _all('.can-toggle-forgotpsw')
function toggleForgotpsw() {
  console.log('toggling forgotpsw')
  let forgotBox = _('.forgot-details')
  let forgotBackground = _('.background-forgot')
  forgotBackground.classList.toggle('run')
  forgotBox.classList.toggle('run')
}

forgotpswToggles.forEach(toggle => toggle.addEventListener('click', function () {
  toggleForgotpsw()
}))
// ////////////////////////////////////////

// toggles notification
const notificationToggles = _all('.can-toggle-notification')
function toggleNotification(success, message) {
  console.log('toggling notification ' + success)
  let messageArea = _('.notification-message')
  let notification = _('.notification')
  let notificationBackground = _('.background-notification')
  if (success === true) {
    notificationBackground.style.backgroundColor = 'rgba(34, 63, 22, 0.96)'
  } else {
    notificationBackground.style.backgroundColor = 'rgba(63, 22, 22, 0.96)'
  }
  messageArea.innerHTML = message
  notification.classList.toggle('run')
  notificationBackground.classList.toggle('run')
}

notificationToggles.forEach(toggle => toggle.addEventListener('click', function () {
  toggleNotification()
}))
// ////////////////////////////////////////

// sign up form

function submitSignup() {
  if (checkPsw(_('#psw-reg'), _('#psw-reg2')) === true) {
    let formdata = new FormData()
    formdata.append('uname-reg', _('#uname-reg').value)
    formdata.append('email-reg', _('#email-reg').value)
    formdata.append('psw-reg', _('#psw-reg').value)
    let ajax = new XMLHttpRequest()
    ajax.open('POST', './includes/signup.inc.php')
    ajax.onreadystatechange = function () {
      if (ajax.readyState === 4 && ajax.status === 200) {
        if (ajax.responseText === 'success') {
          toggleNotification(true, 'Your account was successfully created!')
          toggleSignup()
          _('.signup-form form').reset()
          checkPsw(_('#psw-reg'), _('#psw-reg2'))
        } else {
          toggleNotification(false, ajax.responseText)
        }
      }
    }
    ajax.send(formdata)
  } else {

  }
}
// ////////////////////////////////////////

// clears form

// ////////////////////////////////////////

// validate if passwords are matching

function checkPsw(first, second) {
  let pattern = /(?=^.{8,}$)(?=.*\d)(?=.*\D)/
  if (pattern.test(first.value) === true) {
    first.parentElement.style.borderBottom = '1px solid rgb(117, 222, 114)'
    first.parentElement.style.color = 'rgb(117, 222, 114)'
  } else {
    if (first.value === '') {
      first.parentElement.style.borderBottom = '1px solid rgba(255,255,255,0.5)'
      first.parentElement.style.color = 'rgb(255, 255, 255)'
    } else {
      first.parentElement.style.borderBottom = '1px solid rgb(255, 3, 3)'
      first.parentElement.style.color = 'rgb(255, 3, 3)'
    }
  }
  if (second.value === '') {
    second.parentElement.style.color = 'rgb(255, 255, 255)'
    second.parentElement.style.borderBottom = '1px solid rgba(255,255,255,0.5)'
  } else {
    if (first.value === second.value && pattern.test(first.value) === true) {
      // console.log('matches')
      // console.log(first.value + ' = ' + second.value)
      second.parentElement.style.color = 'rgb(117, 222, 114)'
      second.parentElement.style.borderBottom = '1px solid rgb(117, 222, 114)'
      return true
    } else {
      // console.log('no go :(')
      // console.log(first.value + ' != ' + second.value)
      second.parentElement.style.color = 'rgb(255, 3, 3)'
      second.parentElement.style.borderBottom = '1px solid rgb(255, 3, 3)'
    }
  }
}

_('#psw-reg').addEventListener('keyup', function () {
  checkPsw(_('#psw-reg'), _('#psw-reg2'))
})
_('#psw-reg2').addEventListener('keyup', function () {
  checkPsw(_('#psw-reg'), _('#psw-reg2'))
})
// ////////////////////////////////////////
