<?
echo "Метод передачи данных: ".$_SERVER['REQUEST_METHOD'];
echo "<br/>Получили по средствам AJAX технологии следующие данные:";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
?>