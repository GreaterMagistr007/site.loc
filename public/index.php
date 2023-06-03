Сайт делится на 2 составляющих:
Ядро
Тема

Фнукционал ядра:
- Принимать и обрабатывать запросы по апи:
    - Вернуть статус сайта (ping)
    - CRUD по статьям
        - Получить весь список статей
        - Ответить о расхождениях по списку
        - Получить конкретную статью со всеми параметрами
        - Изменить статус статьи согласно списку
    - работа с темами
        - Получить тему, заменив все файлы темы локально
        - Отправлять страницы на шаблонизацию в тему и кэшировать их после
- фиксация посещений

Функционал Темы:
- соответствие одному интерфейсу для взаимодействия
- Получать тип страницы и список необходимого контента для размещения на этой странице, затем возвращать результат
- Присутствие блоков (мест) для размещения рекламы
- Необходимая реализация страниц:
    - Главная
        - список последних статей
        -
    - Статья
        - Заголовок
        - мета-теги
        - автор
        - дата публикации
        - Описание (краткое содержание статьи)
        - контент
    - 404
    - поиск?

<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once('../core/init.php');