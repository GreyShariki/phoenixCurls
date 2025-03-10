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
  if (password.value.length < 6) {
    passCorrect = false;
  }
  if (allFilled && passCorrect) {
    button.classList.remove("disabled");
  } else {
    button.classList.add("disabled");
  }
};
const show = (elementShow, elementHide) => {
  const show = document.getElementById(elementShow);
  const hide = document.getElementById(elementHide);
  show.classList.replace("d-none", "d-block");
  hide.classList.replace("d-block", "d-none");
};
document.addEventListener("DOMContentLoaded", function () {
  const serviceSelect = document.getElementById("serviceSelect");
  const priceDisplay = document.getElementById("priceDisplay");
  serviceSelect.addEventListener("change", function () {
    const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
    const price = selectedOption.getAttribute("data-price");
    priceDisplay.textContent = price || "0";
  });
});
