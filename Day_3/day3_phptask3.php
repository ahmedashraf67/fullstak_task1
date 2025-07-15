<?php

$grade = 70;

if (isset($grade) && $grade !== '') {

    if ($grade > 50) {
        echo "الطالب ناجح ";
    } else if ($grade < 50){
        echo "الطالب راسب ";
    }

} else {
    echo "من فضلك أدخل درجة الطالب ";
}
?>
<?php

$grade = 80;


if (isset($grade) && $grade !== '') {

    if ($grade > 50) {
        echo "الطالب ناجح ";
    } else {
        echo "الطالب راسب ";
    }

} else {
    echo "من فضلك أدخل درجة الطالب ";
}
?>

