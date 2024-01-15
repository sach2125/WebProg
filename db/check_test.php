<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answers = array("b", "a", "a", "a", "a", "b"); // Правильные ответы для всех 6 вопросов
    $user_answers = array($_POST['q1'], $_POST['q2'], $_POST['q3'], $_POST['q4'], $_POST['q5'], $_POST['q6']); // Полученные ответы

    $correct_count = 0;
    $incorrect_answers = array();
    for ($i = 0; $i < count($answers); $i++) {
        if ($user_answers[$i] === $answers[$i]) {
            $correct_count++;
        } else {
            $incorrect_answers[] = $i + 1;
        }
    }

    echo "Количество правильных ответов: " . $correct_count . "<br>";
    echo "Неправильные ответы: " . (empty($incorrect_answers) ? "нет" : implode(", ", $incorrect_answers));
}
?>
