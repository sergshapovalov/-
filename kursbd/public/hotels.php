<?php 
require_once __DIR__ . '/../src/helpers.php'; 

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__logo">
                        <img src="../images/logo.jpg" alt="" width="80px">
                    </div>
                    <nav class="header__item">
                        <ul class="header-item-list">
                            <li><a href="$" class="header-item__link">Профиль</a></li>
                            <li><a href="my_reservations.php" class="header-item__link">Мои бронирования</a></li>
                            <!-- <li><a href="$" class="header-item__link">Избранное</a></li> -->
                            <div class="header__search">
                                <label for="search__btn"></label>
                                <button id="search__btn"><img src="../images/search.svg" alt="" height="30px"></button>
                                <li><input type="search" class="header-item__search" placeholder="Поиск жилья"></li>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <div class="main__inner">
                    <div class="left__menu">
                        <nav class="left-menu__item">
                            <a href="flats.php" class="left-menu__link">Квартиры</a>
                            <a href="guest_house.php" class="left-menu__link">Гостевые дома</a>
                            <a href="rooms.php" class="left-menu__link">Комнаты</a>
                            <a href="hotels.php" class="left-menu__link left-menu__active">Отели</a>
                            <a href="hostels.php" class="left-menu__link">Хостелы</a>
                        </nav>
                    </div>
                    <div class="room__container">
                        <?php $hotels = get_hotels();?>
                        <?php if ($hotels): ?>
                        <?php foreach ($hotels as $hotel): ?>
                        <form action="../src/actions/add_reservation.php" method="post">
                        <div class="room__item">
                            <input type="hidden" name="action" value="<?php echo $hotel['id']; ?>">
                            <img src="<?php echo $hotel['image']; ?>" alt="Ошибка при загрузке изображения!">
                            <span><?php echo $hotel['name']; ?></span>
                            <span>Цена: <?php echo $hotel['price']; ?></span>
                            <span>Город: <?php echo $hotel['city']; ?></span>
                            <span>Адрес: <?php echo $hotel['address']; ?></span>
                            <?php if ($hotel['description'] !== null): ?>
                            <span>Описание: <?php echo $hotel['description']; ?></span>
                            <?php endif; ?>
                            <!-- <button>В Избранное</button> -->
                            
                            <button>Забронировать</button>
                        </div>
                        </form>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
