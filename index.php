<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PIP LAB#1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="./res/duck.png" type="image/png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="form_container">
    <div id="header" class="block">
		<span id="name">
            <h4>Лабораторная работа № 1<br/>
                Вариант 18102</h4><br/>
		Выполнили: Баталов Евгений Витальевич и Прилуцкая Татьяна Ивановна <br/>
		Группа: P3201 <br/>
		</span>
    </div>
    <div id="margins" class="block">
        <form method="post" action="table.php" id="main_form" name="main_form" onsubmit="return validate()">
        <fieldset class="param_field">
            <legend>Значение Х</legend>
            <span>Выберите значение X:</span>
            <div class="styled-select">
                <select name="x_input">
                    <option value="-5">-5</option>
                    <option value="-4">-4</option>
                    <option value="-3">-3</option>
                    <option value="-2">-2</option>
                    <option value="-1">-1</option>
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </fieldset>
        <fieldset class="param_field">
            <legend>Значение Y</legend>
            <p><input type='text' name='y_input' id="y_input" placeholder="Y є (-5; 5)" autocomplete="off" onkeypress="return disable_not_numbers()"
                      onfocus="removeError(this, this.parentNode)" onpaste="return disable_not_numbers()"></p>
            <label for="y_input" id="y_note">*все числа округляются до 3 знаков после запятой*</label>
        </fieldset>
        <fieldset class="param_field">
            <legend>Значение R</legend>
            <span>Выберите значение R:</span>
            <div class="styled-select">
                <select name="r_input">
                    <option value="1">1</option>
                    <option value="1,5">1.5</option>
                    <option value="2" selected>2</option>
                    <option value="2,5">2.5</option>
                    <option value="3">3</option>
                </select>
            </div>
        </fieldset>
        <p><input type="submit" name="mainform_submit" value="Проверить" id="mainform_submit"></p>
        </form>

    </div>
    <div id="image" class="block">
        <p><img src="./res/graph.png"></p>
        <p>Попадание точки на координатной плоскости в заданную область</p>
    </div>
    <div id="footer" class="block">
        <p><br/>&copy; Университет ИТМО<br/> 2018</p>
    </div>
</div>
<script>
    // TODO remove validation to js file
    function validate(){
        let y = document.forms['main_form']['y_input'],
            yValue = y.value;
        yValue = yValue.replace(/,/g, '.');
        let min_y = -5;
       let max_y = 5;
        if (yValue === "") {
            removeError(y, y.parentNode);
            setError(y, y.parentNode, 'Где Y ?');
            return false;
        }
        else if (isNaN(yValue)) {
            removeError(y, y.parentNode);
            setError(y, y.parentNode, 'Это определённо не число');
            return false;
        }
        else if (Math.round((yValue * 1000) / 1000) > max_y) {
            removeError(y, y.parentNode);
            setError(y, y.parentNode, 'Внезапно: ' + Math.round((yValue * 1000) / 1000) + ' > ' + max_y + ' !');
            return false;
        }
        else if (Math.round((yValue * 1000) / 1000) < min_y) {
            removeError(y, y.parentNode);
            setError(y, y.parentNode, 'Внезапно: ' + Math.round((yValue * 1000) / 1000) + ' < ' + min_y + ' !');
            return false;
        }
        return true;
    }

</script>
</body>
</html>