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
setcookie("name", "Denis", time() + 86400 * 30);
if(isset($_COOKIE["name"])) {
    echo $_COOKIE["name"];
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