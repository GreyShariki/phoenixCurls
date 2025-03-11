<?php
session_start();
?>
<!DOCTYPE html>
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
              <a
                class="nav-link text-main m-0"
                href="./appointment.php"
                >Записаться</a
              >
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-main m-0 active" href="./galery.html"
                >Галерея</a
              >
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-main m-0" href="./auth.html">Профиль</a>
            </li>
            <form class="d-flex d-flex align-items-center">
              <input
                class="form-control me-2"
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
   
      <div class = "container row">
        <div class= "col-6 col-md-2">
            <div class = "list-group">
                    <button type = "button" onclick = "show('Пользователи','Записи')" class = "list-group-item list-group-item-action">Пользователи</button>
                    <button type = "button" onclick = "show('Записи', 'Пользователи')" class = "list-group-item list-group-item-action">Записи</button>
            </div>
        </div>
        <div class = "col-10 col-md-8">
        <table id = "Пользователи" class = "table table-light table-striped w-100 d-block">
                <thead>
                    <tr>
                        <th class = "h6" scope = "col">id</th>
                        <th class = "h6" scope = "col">Имя</th>
                        <th class = "h6" scope = "col">Фамилия</th>
                        <th class = "h6" scope = "col">Email</th>
                        <th class = "h6" scope = "col">Роль</th>
                        <th class = "h6" scope = "col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    require_once("../../server/db.php");
                    $id = $_GET['id'];
                    $role = $_GET["role"];
                    if ($role === "user"){
                        $sql = "UPDATE users SET role = 'specialist' where id = $id";
                        $conn->query($sql);
                    };
                    if ($role === 'specialist'){
                        $sql = "UPDATE users SET role = 'admin' where id = $id";
                        $conn->query($sql);
                    };
                    if ($role === 'admin'){
                        $sql = "UPDATE users SET role = 'user' where id = $id";
                        $conn->query($sql);
                    };
                    
                    $sql = "SELECT * from users";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo "
                        <form method = 'get' >
                        <tr><td>".$row["id"]."</td>
                        <td>".$row["fname"]."</td>
                        <td>".$row["lname"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["role"]."</td>
                        <input name = 'id' type='hidden' value = ".$row['id'].">
                        <input name = 'role' type='hidden' value = ".$row['role'].">
                        <td><button type = 'submit' class = 'btn-primary btn'>Сменить роль</button></td></tr>";
                    };
                    ?>
                    </form>
                </tbody>
            </table>
            <table id = "Записи" class = "table table-light table-striped w-100 d-none">
                <thead>
                    <tr>
                        <th class = "h6" scope = "col">Дата</th>
                        <th class = "h6" scope = "col">Время</th>
                        <th class = "h6" scope = "col">Тип услуги</th>
                        <th class = "h6" scope = "col">Специалист</th>
                        <th class = "h6" scope = "col">Цена</th>
                        <th class = "h6" scope = "col">Статус</th>
                        <th class = "h6" scope = "col"></th>
                        <th class = "h6" scope = "col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../../server/db.php");
                    $id = $_GET['id'];
                    if ($_GET['success'] === 'Одобрена'){
                        $sql = "UPDATE applications SET status = 'Одобрена' where id = $id";
                        $conn -> query($sql);
                    };
                    if ($_GET['success'] === 'Отклонена'){
                        $sql = "UPDATE applications SET status = 'Отклонена' where id = $id";
                        $conn -> query($sql);
                    };
                    $sql = "SELECT * from applications";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        echo "<form methot = 'GET'><tr><td>".$row["date"]."</td>
                        <td>".$row["time"]."</td>
                        <td>".$row["type_of_service"]."</td>
                        <td>".$row["specialist"]."</td>
                        <td>".$row["price"]." р.</td>
                        <input name = 'success' type='hidden' value = 'Одобрена'>
                        <input name = 'id' type='hidden' value = ".$row['id'].">
                        <td>".$row["status"]."</td>
                        <td><button type = 'submit' class = 'btn-success btn'>Одобрить</button></td>
                        </form>
                        <form method = 'GET'>
                        <input name = 'success' type='hidden' value = 'Отклонена'>
                        <input name = 'id' type='hidden' value = ".$row['id'].">
                        <td><button type = 'submit' class = 'btn-danger btn'>Отклонить</button></td>
                        </form>
                        </tr>
                        ";
                    };
                    ?>
                </tbody>
            </table>
        </div>
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
  <script src = "../js/script.js"></script>
</html>
