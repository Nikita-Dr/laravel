## Суть проекта
По модели данных в которой указано что названия файлов, которые необходимо отобразить пользователю хранятся в базе данных, а текст отображаемый пользователю хранится напрямую в базе данных
![Header](https://github.com/Nikita-Dr/laravel/blob/main/unt.png)

Ссылка на [роуты](https://github.com/Nikita-Dr/laravel/blob/main/routes/web.php) который вызывает [контроллер](https://github.com/Nikita-Dr/laravel/blob/main/app/Http/Controllers/MyControler.php) в котором реализованы методы: 
- Экспорт пользователей в формат csv,
- Создать обращение - пользователь вводит данные в форму
- Получить обращение по id
- Получать json массив с концертами
- Методы для получения: изображения, файла, музыки, текста.


База данных создается [миграциями](https://github.com/Nikita-Dr/laravel/tree/main/database/migrations) и заполняется [seeder'ом](https://github.com/Nikita-Dr/laravel/tree/main/database/seeders)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


