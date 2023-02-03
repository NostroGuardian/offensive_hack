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
- [ ] Создать отдельные таблицы для каждой страницы чата, чтобы введенные пейлоады не мигрировали между разными чат бейсед тасками
- [ ] Начать обсуждение переработки уровней сложности


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
      Очистка проводится на стороне JS, код должен быть размещен в отдельном JS скрипте. Ученик вводит пейлоад <script>alert()</script>, нажимает отправить и из его ввода удаляются опасные теги. Обход удаления тегов <script> и других через написание их в другом регистре, например <ScRiPt>, <SCRIPT>, или запрет вызова JS файла. Взять на заметку, вариант нам подходит https://youtu.be/IQTJOxzhOWk?t=1350
      ```
    </details>   

- [ ] 3. Hard сложность - убирать из ввода юзера опасные теги через str_ireplace на стороне сервера, клиент не должен видеть полный список блеклиста. 

   - <details>
      <summary>Описание работы Hard</summary>

      ```
      Ученик вводит пейлоад <script>alert()</script>, нажимает отправить и его сообщения попадает на страницу без опасных тегов. Ученик не видит блеклист в JS должен будет методом проб составить полный список тегов в блеклисте и обойти их.
      ```
    </details>
   
## ТЗ по Таск #2:
   
 Это Stored XSS, где ввод пользователя хранится в атрибуте input. Таск подразумевает атаку XSS break out of attributes, при которой для запуска нашего JS кода нужно выйти из атрибута, например, использовать пейлоад "><script>alert()</script>, который закроет атрибут input для исполнения нашего кода
   
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
   
 - [ ] 3. Hard сложность - убирать из ввода юзера опасные теги через str_ireplace на стороне сервера, клиент не должен видеть полный список блеклиста.
   
   - <details>
      <summary>Описание работы Hard</summary>

      ```
      Ученик вводит пейлоад с закрытием атрибута, нажимает отправить и его сообщения попадает на страницу без опасных тегов. Ученик не видит блеклист в JS должен будет методом проб составить полный список тегов в блеклисте и обойти их. ВАЖНО! Список блеклистов должен отличаться от Hard-1
      ```
    </details>
   
   
## ТЗ по Таск #3:
Это Reflected XSS в форме поиска. Ученик вводит пейлоад в строку поиска, ввод отображается на странице и исполняется в браузере.
   
 - [ ] 1. Easy сложность - нет защит
   
   - <details>
      <summary>Описание работы Easy</summary>

      ```
   Ученик ввел <script>alert()</script> в форму поиска и получил алерт. Пейлоад упал внутрь тега.
      ```
    </details>
   
 - [ ] 2. Medium сложность - нет защит, но ввод должен отображаться в атрибуте
   
   - <details>
      <summary>Описание работы Medium</summary>

      ```
   Ученик ввел "><script>alert()</script> в форму поиска и получил алерт при закрытии атрибута (Чет хуйня, надо пересмотреть уровни сложности, потому что будут частые повторения условий выполнения, как в Сторед 1,2 и Рефлектед 1)
      ```
    </details>
