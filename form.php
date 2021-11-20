<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--api php thuần-->
<form name="formClient" method="post">
    <label for="name">name: </label><br>
    <input type="text" id="name" name="name"><br>
    <span style="color: red" class="errorName"></span>

    <label for="email">email: </label><br>
    <input type="email" id="email" name="email"><br>
    <span style="color: red" class="errorEmail"></span>

    <label for="telephone">telephone: </label><br>
    <input type="text" id="telephone" name="telephone"><br>
    <span style="color: red" class="errorTelephone"></span>

    <label for="content">content:</label><br>
    <input type="text" id="avatar" name="content"><br>
    <span style="color: red" class="errorContent"></span>

    <label for="date">date:</label><br>
    <input type="date" id="date" name="date"><br>
    <span style="color: red" class="errorDate"></span>

    <label for="status">status:</label><br>
    <select id="status" name="status">
        <option value="Read">Read</option>
        <option value="Unread">Unread</option>
    </select>

    <input type="submit" value="Submit">
</form>

<!--Trường hợp cho api php thuần-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        const inputName = $('input[name=name]');
        const inputEmail = $('input[name=email]');
        const inputTelephone = $('input[name=telephone]');
        const inputContent = $('input[name=content]');
        const inputDate = $('input[name=date]');
        const inputStatus = $('select[name=status]');

        $('form[name=formClient]').submit(function (event) {
            let message = [];
            if (inputName.val() === '' || inputName.val() == null){
                message.push(' required\n');
                $('.errorName').text("Name is required");
            } else {
                $('.errorName').text("");
            }
            if (inputEmail.val() === '' || inputEmail.val() == null){
                message.push(' required\n');
                $('.errorEmail').text("Email is required");
            } else {
                $('.errorEmail').text("");
            }
            if (inputTelephone.val() === '' || inputTelephone.val() == null){
                message.push(' required\n');
                $('.errorCreatedAt').text("Telephone at is required");
            } else {
                $('.errorCreatedAt').text("");
            }
            if (inputContent.val() === '' || inputContent.val() == null){
                message.push(' required\n');
                $('.errorContent').text("Content at is required");
            } else {
                $('.errorContent').text("");
            }
            if (inputDate.val() === '' || inputDate.val() == null){
                message.push(' required\n');
                $('.errorDate').text("Date at is required");
            } else {
                $('.errorDate').text("");
            }
            if (message.length > 0){
                event.preventDefault();
                return false;
            }

            event.preventDefault(); // đảm bảo dữ liệu sẽ gửi đi nhưng sẽ không chạy đến đường dẫn, tức là ở nguyên tại chỗ
            let data = {
                name: inputName.val(),
                email: inputEmail.val(),
                telephone: inputTelephone.val(),
                content: inputContent.val(),
                date: inputDate.val(),
                status: inputStatus.val(),
            };
            // alert(JSON.stringify(data));

            $.ajax({
                url:'http://localhost:8080/Thi_DW_2/processForm.php',
                method: 'POST',
                data: JSON.stringify(data),
                success : function (responseData) {
                    alert(responseData.message);
                    // loadData();
                    // $('form[name=formCity]').trigger("reset");
                    window.location.href = "http://localhost:8080/Thi_DW_2/list.php";
                },
                error:function () {
                    alert('something error');
                }
            });
        });
    });
</script>
</body>
</html>