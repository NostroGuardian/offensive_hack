# OFFENSIVE HACK
To-Do List:
- [X] changing difficulty from hard to medium
- [X] rename exit.php to logout.php
- [X] logout btn doesn't work
- [X] back btn doesn't work
- [X] sucsessfully registration alert
- [X] registration with spaces in login and password input
- [ ] XSS prevention
- [ ] SQLI prevention
- [ ] Починить "поломку" страницы Easy-1 при отправке пейлоада <script>
- [ ] На Medium-1 добавить фильтрацию ввода пользователя после нажатия кнопки отпрвавки сообщения. 
- [ ] Заменить кнопки переключения сложности на DOM, чтобы сложность менялась нажатием без обновления страницы и после при нажатии на номер таска был редирект на выбранный таск с нужным уровнем сложности


## ТЗ по Таск #1:

Это базовая Stored XSS для демонстрации общей концепции её работы и базовым методам защиты.

- [X] 1. Easy сложность - не имеет защит
   
   - <details>
      <summary>Описание работы Easy</summary>

      ```
      Ученик вводит пейлоад <script>alert()</script>, чтобы ознакомиться с атакой
      ```
    </details>
     
   
- [ ] 2. Medium сложность - убирать из ввода юзера опасные теги с учетом регистра (аналог str_ireplace в PHP). 
   
   - <details>
      <summary>Описание работы Medium</summary>

      ```
      Очистка проводится на стороне JS, код должен быть размещен в отдельном JS скрипте. Ученик вводит пейлоад <script>alert()</script>, нажимает отправить и из его ввода удаляются опасные теги. Обход удаления тегов <script> и других через написание их в другом регистре, например <ScRiPt>, <SCRIPT>, или запрет вызова JS файла
      ```
    </details>   

- [ ] 3. Hard сложность - убирать из ввода юзера опасные теги через str_ireplace на стороне сервера, клиент не должен видеть полный список блеклиста. 

   - <details>
      <summary>Описание работы Hard</summary>

      ```
      Учение вводит пейлоад <script>alert()</script>, нажимает отправить и его сообщения попадает на страницу без опасных тегов. Ученик не видит блеклист в JS должен будет методом проб составить полный список тегов в блеклисте и обойти их.
      ```
    </details>
   
## ТЗ по Таск #2:
   
 Это Stored XSS, где ввод пользователя хранится в атрибуте input. Таск подразумевает атаку XSS in HTML tag attributes, при которой для запуска нашего JS кода нужно выйти из атрибута, например, использовать пейлоад "><script>alert()</script>, который закроет атрибут input для исполнения нашего кода
   
 - [ ] 1. Easy сложность - не имеет защит
   
   - <details>
      <summary>Описание работы Easy</summary>

      ```
      Ученик вводит пейлоад "><script>alert()</script>, чтобы выйти из атрибута и исполнить свой JS код
      ```
    </details>
   
 - [ ] 2. Mediun сложность - добавлена фильтрация ввода на стороне JS для удаления опасных тегов
   
   - <details>
      <summary>Описание работы Medium</summary>

      ```
      Очистка проводится на стороне JS, код должен быть размещен внутри страницы, а не в отдельном JS файле. Ученик вводит пейлоад "><script>alert()</script>, нажимает отправить и из его ввода удаляются опасные теги. Обход удаления тегов <script> и других через написание их в другом регистре, например <ScRiPt>, <SCRIPT>, или через удаление нужного JS кода из сурса страницы
      ```
    </details>
   
 - [ ] 3. Hard сложность - ?
   
   - <details>
      <summary>Описание работы Hard</summary>

      ```
      ?
      ```
    </details>
   
   
## ТЗ по Таск #3:
Это Reflected XSS и что-то там ещё
