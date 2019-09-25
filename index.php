<?php
session_start();
if (!isset($_SESSION["listResult"])) {
    $_SESSION["listResult"] = array();
    $_SESSION["i"] = 0;
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная №1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
    <script>
        function out(data) {
            $(".out").html(data)
        }


        function checkValue() {
            var y = document.getElementById("checkY").value.replace(',', '.');
            var r = document.getElementById("checkR").value.replace(',', '.');


            if (Number(y) <= -3 || Number(y) >= 5 || isNaN(y) || y.trim() == "") {
                alert("\n Неправильно введен Y ");
            }
            if (Number(r) <= 1 || Number(r) >= 4 || isNaN(r) || r.trim() == "") {
                alert("\n Неправильно введен R ");
            }

        }


        $(document).ready(function () {
            $(".send").bind("click", function () {
                var radios = document.getElementsByName("x");
                var index = 4;
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        index = i;
                        break;
                    }
                }
                var X = radios[index].value;
                var Y = document.getElementById("checkY").value;
                var R = document.getElementById("checkR").value;
                $.ajax({
                    url: "./out.php",
                    type: "GET",
                    data: ({x: X, y: Y, r: R}),
                    dataType: "html",
                    beforeSend: checkValue,
                    success: out
                });
            });
        });


    </script>
</head>

<body style="background-image: url(src/img/1.jpg); background-attachment: fixed">
<table id="mainTable" cellpadding=10 cellspacing=0 border=0>
    <tr class="heading">
        <td class="name" blick="on">
            <a href="https://vk.com/amirjon_qodirov">Кадыров Амирджон</a>
        </td>

        <td class="group" blick="on" align="right">
            Группа P3200
        </td>
        <td class="task_number" blick="on" align="right">
            Вариант 210003
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <hr>
        </td>
    </tr>

    <tr>
        <td width=20%>
            <fieldset>
                <form method="GET">

                    <legend blick="on" id=90>Выберите X, Y и R:</legend>
                    <hr>
                    <br>
                    <table class="x" border=1>
                        <caption>X:</caption>
                        <tr>
                            <td>-2<br><input type="radio" name="x" value="-2"></td>
                            <td>-1.5<br><input type="radio" name="x" value="-1.5"></td>
                            <td>-1<br><input type="radio" name="x" value="-1"></td>
                        </tr>
                        <tr>
                            <td>-0.5<br><input type="radio" name="x" value="-0.5"></td>
                            <td>0<br><input type="radio" name="x" value="0" checked></td>
                            <td>0.5<br><input type="radio" name="x" value="0.5"></td>
                        </tr>
                        <tr>
                            <td>1<br><input type="radio" name="x" value="1"></td>
                            <td>1.5<br><input type="radio" name="x" value="1.5"></td>
                            <td>2<br><input type="radio" name="x" value="2"></td>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <br>
                    Y: <input type="text" name="y" placeholder="(-3...5)" id="checkY" maxlength="9"> <br> <br>
                    <hr>
                    <br>
                    R: <input type="text" name="r" placeholder="(1...4)" id="checkR" maxlength="9"> <br> <br>
                    <hr>
                    <input type="button" name="submit" value="Отправить" class="send">
                    <hr>
                    <!--<p class="send" >OTPR</p>-->
                </form>
                <form class="clear_table" action="clear.php" method="GET">
                    <input type="submit" value="Очистить"/>
                </form>
            </fieldset>
        </td>

        <td colspan="2">
            <img class="task" src="src/img/task1.png">
        </td>
    </tr>

    <tr>

        <td colspan="3">
            <img src="src/img/graf.png" class="graf">
            <div class="out">
    <tr>
	
        <td colspan=3>
            <hr>
        </td>
    </tr>
    </div>
    <tr>
        <td>
            <a href="https://se.ifmo.ru" target="_blank">
                <img src="src/img/itmologo.jpg" class="ty" alt="logo">
        </td>
        <td align="right">
            2019 год
        </td>
        <td>
            <i><b>Преподаватель:</b></i> Александр Яркеев
        </td>


    </tr>
</table>


</body>


</html>
