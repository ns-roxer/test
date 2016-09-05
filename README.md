# Тестовое задание

###Для выполнения тз нужно:

1. Сделать форк этого репозитория
2. Выполнить задания описанные в файлах ```test*.php```
3. Закомитить и прислать ссылку

## Update 06.09.2016:
### Решение 
* сами решения в файле Solution/Solution.php
* тесты в Solution/Tests/TestSolution.php
* для проверки необходимо поставить phpunit:
    * если composer установлен глобально: ```composer install``` 
    * иначе ```php composer.phar install```
* запуск тестов: ``` vendor/bin/phpunit Solution/Tests/TestSolution.php ```