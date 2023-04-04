<?php
//echo "Hello!";
//print_r("Hello");
//var_dump("Hello");

//$name = "Denis";
//$age = 42;
//print_r("My name is " . $name . ". I am " . $age . " years old.");

//$numbers = [1,2,3];
//echo $numbers[2];
//echo count($numbers);

//$posts = ["Post one","Post two","Post three"];

/* for ($i = 0; $i < count($posts); $i++) {
    echo $posts[$i] . "<br>";
} */

//foreach ($posts as $post) {
//    echo $post . "<br>";
//}

//Поиск в массиве
//var_dump(in_array("Post two", $posts));

//Длина массива
//echo count($posts);

//Добавить значание в конец массива
//array_push($posts, "Post four");
//echo $posts[3];

//Добавить значание в начало массива
//array_unshift($posts, "Post zero");
//echo $posts[0];

//Удалить из конца массива
//array_pop($posts);
//echo count($posts) . " " . $posts[1];

//Удалить из начала массива
//array_shift($posts);
//echo count($posts) . " " . $posts[0];

//Удалить конкретное значение из массива
//unset($posts[1]);
//print_r($posts);

//Объединить два массива
//$arr1 = [1,2,3];
//$arr2 = [4,5,6];

//$arr3 = array_merge($arr1, $arr2);
//print_r($arr3);

//Объединить два массива так, чтобы значения из одного были ключами, а значения второго - значениями в новом массиве
//$a = ["green","red","yellow"];
//$b = ["avocado","apple","banana"];

//$c = array_combine($a, $b);
//print_r($c);

//А чтобы создать массив, состоящий только из ключей, необходимо выполнить следующее
//$keys = array_keys($c);
//print_r($keys);

//Чтобы перевернуть массив так, чтобы ключи стали значениями, а значения ключами выполнить следующее
//$flipped = array_flip($c);
//print_r($flipped);

/*$people = [
    [
        "First name" => "Denis",
        "Last name" => "Meshcheryakov",
        "E-mail" => "get-out@yandex.ru",
    ],
    [
       "First name" => "Anna",
        "Last name" => "Meshcheryakova",
        "E-mail" => "snaiper_37@rambler.ru", 
    ]
];

print_r($people[0]["First name"] . " " . $people[1]["E-mail"]);
*/

/*if ($age >= 18) {
    print_r("You are old enough.");
} else {
    print_r("Sorry. You are too young.");
}*/

//$current_date_time = date("d.m.Y H:i");
//echo $current_date_time;
/* if (isset($_POST["submit"])) { //isset - это специальная доп. проверка, чтобы на страницу не вываливались сообщения об ошибке
    echo $_POST["name"];
    echo $_POST["age"];
}*/

//Куки
//setcookie("name", "Denis", time() + 86400 * 30);
//if(isset($_COOKIE["name"])) {
//    echo $_COOKIE["name"];
//}

//Сессии
/* session_start(); //Заускаем сессию
//Проверяем факт отправки пользователем данных через форму
if(isset($_POST["submit"])) {
    //Этой командой мы фильтруем вводимый пользователем на форме текст, предотваращая таким образом, например, ввод вредоносного кода javascript
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];

    if ($username == "john" && $password == "password") {
        //Если имя пользователя и пароль подходят - назначаем сессии в качестве идентификатора имя пользоватлея
        $_SESSION["username"] = $username;
        //Перенаправляем пользователя на указанную страницу
        header("Location: dashboard.php");
    } else {
        //Если пароль и имя пользователя не подошли - выводим сообщение об ошибке
        echo "Incorrect login or password";
    }
} */

//Работа с файлами
//Чтение файла
/*$file = "users.txt";
if (file_exists($file)) { //проверяем существует ли файл
    $handle = fopen($file, "r"); //открываем файла на чтение
    $contents = fread($handle, filesize($file)); //считываем содержимое файла в переменную
    fclose($handle); //закрываем файл после считывания
    echo $contents;
} else {
    $handle = fopen($file, "w"); //если такого файла нет, то создаем его
    $contents = "John" . PHP_EOL . "Mary" . PHP_EOL . "Bob" . PHP_EOL . "Amanda"; //Создаем контент для файла, где PHP_EOL - перенос строки
    fwrite($handle, $contents); //Записываем контент в файл
    fclose($handle);
} */

//Закачка файлов
if (isset($_POST["submit"])) { /*Проверяем была ли нажата кнопка submit*/
    $allowed_ext = array("png","jpg","jpeg","gif"); /*Создаем список разрешенных расширений файлов для закачки*/
    if (!empty($_FILES["upload"]["name"])) { /*Проверяем есть ли имя закачиваемого файла*/
        $file_name = $_FILES["upload"]["name"];
        $file_size = $_FILES["upload"]["size"];
        $file_tmp = $_FILES["upload"]["tmp_name"];
        $target_dir = "uploads/" . $file_name;
        $file_ext = explode(".", $file_name);
        $file_ext = strtolower(end($file_ext));
        if (in_array($file_ext, $allowed_ext)) {
            if ($file_size <= 1000000) {
                move_uploaded_file($file_tmp, $target_dir);
                $message = "<p style='color: green;'>File uploaded</p>";
            } else {
                $message = "<p style='color: red;'>The file is too large</p>";
            }

        } else {
            $message = "<p style='color: red;'>Invalid file type</p>";
        }
    } else {
        $message = "<p style='color: red;'>Please choose a file</p>"; /*Если файла нет - формируем сообщение о том, что необходимо файл выбрать*/
    }
}

?>

<!-- <a href="<?php echo $_SERVER["PHP_SELF"];?>?name=Denis&age=30">Click</a>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
<div>
    <label for="name">Name: </label>
    <input type="text" name="name">
</div>
<div>
    <label for="age">Age: </label>
    <input type="text" name="age">
</div>
<input type="submit" value="Submit" name="submit">
</form> -->

<!-- <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
<div>
    <label for="username">Userame: </label>
    <input type="text" name="username">
</div>
<div>
    <label for="password">Password: </label>
    <input type="password" name="password">
</div>
<input type="submit" value="Submit" name="submit">
</form> -->

<!-- Закачка файлов -->
<!-- Создаем форму для закачки файлов -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIle upload</title>
</head>
<body>
    <?php echo $message ?? null ?> <!-- Если переменная message не равна null - её содержимое будет выведено на экран -->
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data"> <!-- Для осуществления загрузки файлов через форму обязательно наличие атрибута enctype-->
    Select file to upload:
    <input type="file" name="upload">
    <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>