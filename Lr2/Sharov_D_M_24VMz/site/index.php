<?php include $_SERVER['DOCUMENT_ROOT']."/include_db.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/header.php";?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <link rel="stylesheet" href="index.css">
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Мелодия дороги</title>
    <!-- <script src="index.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body>
  <?php
    $sql = "SELECT * FROM cars";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php
    foreach ($result as $i => $value)
    {
      echo '
      <script>
      function showcar'.($i+1).'() {
        var elements1 = document.getElementsByClassName("description");
        var elements2 = document.getElementsByClassName("img_car_description");

        for (let i = 0; i < elements1.length; i++) { // выведет 0, затем 1, затем 2
          elements1[i].style.display = "none";
          elements2[i].style.display = "none";
        }
        document.getElementById("car'.($i+1).'").style.display = "block";
        document.getElementById("car_img'.($i+1).'").style.display = "block";

      }
      </script>

      <style>
        #car'.($i+1).' {
          display: none;
        }
        #car_img'.($i+1).' 
        {
          display: none;
        }
      </style>
    ';
    }
  ?>
  <Б>
    <div id="middle_page" class="container-hor">

      <div id="cars" class="container">
        <p style="font-size: 30px;" class="title_list" >Каталог автомобилей</p>
        <ul class="list_cars">
          <?php
            foreach ($result as $i => $value)
            {
            echo '
              <li class="list_cars_item" onclick="showcar'.($i+1).'()">
                <img class="img_cars_list" src="'.$value["url_img"].'"/>
                <p class="title_list">'.$value["title"].'</p>
              </li>
            ';
            }

          ?>  
        </ul>
        <!-- <ul class="list_cars">
          <li class="list_cars_item" onclick="showcar1()">
            <img class="img_cars_list" src="ваз2114-1.jpg"/>
            <p>ВАЗ 2114</p>
          </li>
          <li class="list_cars_item" onclick="showcar2()">
            <img class="img_cars_list" src="газ31105-1.jpg"/>
            <p>ГАЗ 31105</p>
          </li>
        </ul> -->
      </div>
      <div id="cars_description">
      <?php
  
            foreach ($result as $i => $value)
            {
            echo 
              '<img id="car_img'.($i+1).'" class="img_car_description"  src="'.$value["url_img"].'"/>
              <div id="car'.($i+1).'" class="description">
                <div class="container-hor">
                  <p class="charac">Мощность:             '.$value["power"].'</p>
                  <p class="charac">Год выпуска:  '.$value["year"].'</p>
                  <p class="charac">Цвет:  '.$value["color"].'</p>
                  <p class="charac">Необходимая категория ВУ:  '.$value["category"].'</p>
                  <p class="charac">Стоимость аренды за час:  '.$value["amount"].'</p>

                </div>
                <p class="text_description">'.$value["description"].'<br><br>
                Все наши автомобили застрахованы на случай ДТП
                </p>
                
                <button data-item-id="'.$value["ID"].'" class="bron_bt">Забронировать</button>
              </div>
            ';
            }

          ?>
      </div>
    </div>
    <div class="popup_inner">
      <div class="okn_main">
              <a class="close_popup">X</a>
              <h3>БРОНИРОВАНИЕ</h3>
              <p>Оставьте заявку и мы с Вами свяжемся</p>
              <form action="bron.php" method="post">
                <input type="hidden" id="itemId" name="itemId" value="">
                <input type="text" name="name" placeholder="Имя" required>
                <input type="email" name="email" placeholder="Электронная почта" required>
                <input type="text" name="number" placeholder="Номер телефона">
                <input type="submit" name="submit" value="Отправить">
              </form>
      </div>
    </div>
  <script>
    $('.bron_bt').on('click', function(){
        $('.popup_inner').addClass('active');
        const itemId =  $(this).attr('data-item-id')
        $('#itemId').val(itemId);

      }
    )
    $('.close_popup').on('click', function(element){
        $('.popup_inner').removeClass('active');
        $('#itemId').val("");
      }
    )
  </script>
  </body>
  </html>