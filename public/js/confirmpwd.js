let Password = document.querySelector('#password');
let ConfirmPassword = document.querySelector('#confirmpassword');
let Button = document.querySelector("#submit");
document.querySelectorAll('input[type="password"]')
.forEach(input => input.addEventListener("change", function (){
  if (!(Password.value == '' || ConfirmPassword.value == '')) {
    let div = document.querySelectorAll('form div');
    div = div[div.length - 1];
    if (div.getAttribute('class') != null && div.getAttribute('class').includes('form-floating')) {
      div.after(document.createElement('div'));
      div = div.nextSibling;
    }
    if (Password.value !== ConfirmPassword.value) {
      div.setAttribute('class', 'text-danger');
      div.innerText = 'Passwords do not match';
      Button.disabled = true;
    } else if (Password.value.length < 8) {
      div.setAttribute('class', 'text-danger');
      div.innerText = 'Password size must be at least 8';
      Button.disabled = true;
    }
    else {
      div.setAttribute('class', 'text-success');
      div.innerText = 'Passwords match';
      Button.disabled = false;
    }
  }
}));