<!DOCTYPE html>
<?php
if ($_COOKIE['role'] === "user"){
  header("location:./profile.php");
};
if ($_COOKIE['role'] === "specialist"){
  header("location:./profile_specialist.php");
};
if ($_COOKIE['role'] === "admin"){
  header("location:./adminpanel.php");
};


?>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/styles/styles.css" />
    <link rel="icon" type="image/x-icon" href="/public/img/logo1.webp" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap"
      rel="stylesheet"
    />
    <title>PhoenixCurls</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg p-0 navbar-light bg-light">
      <div class="container-fluid mb-0">
        <a
          class="navbar-brand navbrand align-items-center d-flex pb-0 mb-0 pe-5"
          href="#"
        >
          <img
            src="/public/img/logo1.webp"
            alt="logo"
            width="100"
            height="100"
          />
          <h4 class="text-main text-center mb-0">PhoenixCurls</h4>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Переключатель навигации"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
          <ul class="navbar-nav justify-content-between me-auto w-100">
            <li class="nav-item d-flex align-items-center">
              <a
                class="nav-link text-main m-0"
                aria-current="page"
                href="../../index.html"
                >Главная</a
              >
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-main m-0" href="./appointment.php"
                >Записаться</a
              >
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-main m-0 " href="./galery.php"
                >Галерея</a
              >
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-main m-0 active" href="./auth.php">Профиль</a>
            </li>
            <form
              action="galery.php?nocache=<?php echo time(); ?>"
              method="get"
              class="d-flex align-items-center"
            >
              <input
                class="form-control me-2"
                name="search"
                type="search"
                placeholder="Поиск"
                aria-label="Поиск"
              />
              <button class="btn btn-outline-primary" type="submit">
                Поиск
              </button>
            </form>
          </ul>
        </div>
      </div>
    </nav>
    <header><p class="text-main p-3">Curls lives matter</p></header>
    <main class="p-5">
      <div class="container-fluid row justify-content-center">
        <form
          class="bg-light col-11 col-md-4 p-3 row justify-content-center d-block"
          method="post"
          action="../../server/registration.php"
          id="register"
        >
          <legend>Регистрация</legend>
          <div class="mb-4">
            <input
              name="email"
              class="form-control reg"
              type="email"
              placeholder="Email"
              oninput="isChange()"
            />
          </div>
          <div class="mb-4">
            <input
              name="fname"
              class="form-control reg"
              type="text"
              placeholder="Имя"
              oninput="isChange()"
            />
          </div>
          <div class="mb-4">
            <input
              name="lname"
              class="form-control reg"
              type="text"
              placeholder="Фамилия"
              oninput="isChange()"
            />
          </div>
          <div class="mb-4">
            <input
              name="password"
              id="password"
              class="form-control reg"
              type="password"
              placeholder="Пароль"
              oninput="isChange()"
            />
          </div>
          <div class="mb-4">
            <input
              name="repPassword"
              id="repPassword"
              class="form-control reg"
              type="password"
              placeholder="Повторите пароль"
              oninput="isChange()"
            />
          </div>
          <div class="mb-4">
            <button
              onclick="setAuth()"
              id="regButton"
              class="w-100 btn btn-primary p-2 disabled"
            >
              Зарегестрироваться
            </button>
          </div>
          <div>
            <button
              onclick="loginShow()"
              type = "button"
              class="btn w-100 btn-primary p-2"
            >
              У меня уже есть аккаунт
            </button>
          </div>
        </form>
        <form
          class="bg-light col-11 col-md-4 p-3 row justify-content-center d-none"
          method="post"
          action="../../server/auth.php"
          id="login"
        >
          <legend>Вход</legend>
          <div class="mb-4">
            <input
              name="email"
              class="form-control"
              type="email"
              placeholder="Email"
            />
          </div>

          <div class="mb-4">
            <input
              name="password"
              class="form-control"
              type="password"
              placeholder="Пароль"
            />
          </div>
          <div class="mb-4">
            <button type="submit" class="w-100 btn btn-primary p-2">
              Войти
            </button>
          </div>
          <div>
            <button
              onclick="registrationShow()"
              class="btn w-100 btn-primary p-2"
            >
              У меня ещё нет аккаунта
            </button>
          </div>
        </form>
      </div>
    </main>
    <footer
      class="d-flex bg-light flex-wrap justify-content-between align-items-center w-100"
    >
      <p class="col-md-4 mb-0 text-body-secondary">
        &copy; 2024 PhoenixCurls, Inc
      </p>

      <a
        href="/"
        class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
      >
        <img src="/public/img/logo1.webp" width="100" height="100" />
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-secondary">Главная</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-secondary">Записаться</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-secondary">Галерея</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-secondary">Личный кабинет</a>
        </li>
      </ul>
    </footer>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="../js/script.js"></script>
</html>
