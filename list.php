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

<table id="content">

</table>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        function loadData() {
            $.ajax({
                url:'http://localhost:8080/Thi_DW_2/listAll.php', // api php thuần
                method: 'get',
                success: function (responseData) {
                    var data = responseData.data;
                    alert(responseData.message);
                    var contentHTML = `<tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>telephone</th>
                            <th>content</th>
                            <th>date</th>
                            <th>status</th>
                            </tr>`;
                    data.forEach(element => {
                        contentHTML += `
                        <tr>
                        <th>${element.id}</th>
                        <th>${element.name}</th>
                        <th>${element.email}</th>
                        <th>${element.telephone}</th>
                        <th>${element.content}</th>
                        <th>${element.date}</th>
                        <th>${element.status}</th>
                        </tr>
                        `;
                    })
                    $('#content').html(contentHTML);
                },
                error:function (error) {
                    alert(error);
                }
            });
        }
        loadData();
    });
</script>
</html>