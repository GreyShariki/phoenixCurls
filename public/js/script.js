const form = document.getElementById("register");
const formLogin = document.getElementById("login");

const loginShow = () => {
  form.classList.replace("d-block", "d-none");
  formLogin.classList.replace("d-none", "d-block");
};
const registrationShow = () => {
  form.classList.replace("d-none", "d-block");
  formLogin.classList.replace("d-block", "d-none");
};

const isChange = () => {
  const password = document.getElementById("password");
  const repPassword = document.getElementById("repPassword");
  const button = document.getElementById("regButton");
  const inputs = document.getElementsByClassName("reg");
  let allFilled = true;
  let passCorrect = true;
  for (let input of inputs) {
    if (!input.value.trim()) {
      allFilled = false;
      break;
    }
  }
  if (password.value.trim() != repPassword.value.trim()) {
    passCorrect = false;
  }
  if (password.value.length < 5) {
    passCorrect = false;
  }
  if (allFilled && passCorrect) {
    button.classList.remove("disabled");
  } else {
    button.classList.add("disabled");
  }
};
