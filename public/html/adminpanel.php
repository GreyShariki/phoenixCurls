
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
              <a class="nav-link text-main m-0 " href="./galery.php]"
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
   
      <div class = "container row">
        <div class= "col-8 col-md-2 mb-5">
            <div class = "list-group">
                    <button type = "button" onclick = "show('Пользователи','Записи')" class = "list-group-item list-group-item-action">Пользователи</button>
                    <button type = "button" onclick = "show('Записи', 'Пользователи')" class = "list-group-item list-group-item-action">Записи</button>
                    <a href = "../../server/destroy.php" class = "list-group-item list-group-item-action">Выйти</a>

            </div>
        </div>
        <div class = "col-12 col-md-8 " style="overflow-x: auto;">
        <table id = "Пользователи" class = "table col-6 table-light table-striped w-100 d-block">
                <thead>
                    <tr>
                        <th class = "h6" scope = "col-4">id</th>
                        <th class = "h6" scope = "col-4">Имя</th>
                        <th class = "h6" scope = "col-4">Фамилия</th>
                        <th class = "h6" scope = "col-4">Email</th>
                        <th class = "h6" scope = "col-4">Роль</th>
                        <th class = "h6" scope = "col-4"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    require_once("../../server/db.php");
                    $user_id = $_GET['user_id'];
                    $user_role = $_GET["user_role"];
                    if ($user_role === "user"){
                        $sql = "UPDATE users SET role = 'specialist' where id = $user_id";
                        $conn->query($sql);
                    };
                    if ($user_role === 'specialist'){
                        $sql = "UPDATE users SET role = 'admin' where id = $user_id";
                        $conn->query($sql);
                    };
                    if ($user_role === 'admin'){
                        $sql = "UPDATE users SET role = 'user' where id = $user_id";
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
                        <input name = 'user_id' type='hidden' value = ".$row['id'].">
                        <input name = 'user_role' type='hidden' value = ".$row['role'].">
                        <td><button type = 'submit' class = 'btn-primary btn'>Сменить роль</button></td></tr></form>";
                    };
                    ?>
                    
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
            <form
          class="bg-light col-11 col-md-4 p-3 row justify-content-center d-block"
          method="post"
          action="../../server/upload.php"
        >
          <legend>Обновить галерею</legend>
          <div class="mb-4">
            <input
              name="name"
              class="form-control"
              type="text"
              placeholder="Стилист"
            />
          </div>
          <div class="mb-4">
            <input
              name="image"
              class="form-control"
              type="text"
              placeholder="Название изображения"
            />
          </div>
          <div class="mb-4">
            <button
              type = "submit"
              class="w-100 btn btn-primary p-2"
            >
              Добавить
            </button>
          </div>
        </form>
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
