# Модуль 25 Галерея и работа  с СУБД

LICENSE: [MIT](./license.md)


----------------------------------------
Небольшое придесловие. Запускал работу на локальном сервере php (php -S 127.0.0.1:8000). БД использовал postgres, Так как это было просто удобней, примеры аватарок и картиноко лежит в папке assets.  
_______________________________________________________

Здравствуйте, в данной работе надо было сделать галерею с подвязкой к СУБД и привязкой комментариев к каждому изображению. 

Среди условий авторизованный пользователь может сохранять изображения и оставлять к нему комментарий. Изначально пользователь не авторизован ,и как следствие он не может оставлять/коментарии , аналогично с изображениями. 

-------------------------------------------
В краце опишу работу фреймворка:
По возможности , я хотел повторить структуру "Laravel", то есть в основном файле index.php идет подключение autoload.php , для автозагрузки классов, config.php, для указания глобальных параметров (Название БД, Логин, Пароль, тип файлов для загрузки и т.д) все необходимых для задания.

Включаю класс App  с методом start , который вызывает поключение к БД с параметрами из файла config.php и библиотеку ReadBean для возможности работы бд как с объектами.

Далее включил router.php. В нем с помощью метода Page() записывается в массив url, класс контролера, и метод контролера.
Далее ключается метод enable(), который смотрит какой сейчас url, если из списка ранее нет совпадений , получаем 404. Если в списке есть совпадение проверяю на метод "POST". После всего стартует родительский контроллер. который выбирает , какой из дочерних контролеро по наименованию и методу ему подобрать.
    
Чаще всего , после всех манипуляций идет переключение на модель , где идет работа с данными , далее данные возвращаются в контроллер и передаются в представление. Или сразу без модели перключается на представление(Там по ситуации.) 
_______________________________________________________

Что касается задания:
Для регистрации я создал LoginController . В нем 5 методов. login() и register() отвечают за вывод представления, register_try() и login_try работают поже, они обращаются к модели UserModel. В регистрации сщитывается форма, хешируется пароль. В логине и дет проверка в бд по email , только потом пароль. После авторизации данные по юзеру записываются в $_SESION.Для будующих сравнений

Домашняя страница работает , через HomeController. Представления расположенные в папке page. Пример name.page.php. Если человек не авторизован , то он на домашней странице сможет посмотреть только картинки и перейти на страницу коментариев к картинке. Авторизованный пользователь может и добалять картинки и удалять, но только свои. При удалении картинки все коментарии к ней удаляются. Логика работы картинок описана в PaintController.

Коментарии я вывыел на другую страницу при нажатии на картинку , только из-за эстетики. так как нагромаждение коментариев и лишних кнопок в картачках смотрелись бы не красиво. Логика работы описанна в ComentController. Удалять коментарии может только авторизованный пользователь при условии, что он их владелец.

Все параметры из задания можно посмотреть в папке config/confgi.php

Пункты все выполнил и работу считаю законченной.


---

GiT logo by GitHub.Own work using: https://github.com/logos, 
license: [CC BY 3.0](https://creativecommons.org/licenses/by/3.0/deed.ru)