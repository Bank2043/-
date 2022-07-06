<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="css/register.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="login-box" style="background: #2d3e3f">
            <form action="index_db.php" method="POST">
                <div class="user-box">
                    <input name="username" ; placeholder="username" type="text" id="Text" class="textBox" /><br />
                </div>
                <div class="box radio">
                <label >Gender : </label>&nbsp; &nbsp;
                    <input type="radio" id="radio1" value="male" name="a" />&nbsp;<label for="male">Male</label>&nbsp; &nbsp;
                    &nbsp;
                    <input type="radio" id="radio2" value="female" name="a" />&nbsp;<label for="female">Famale</label><br />
                </div>
                <div class="box terms">
                    <input type="checkbox" id="checkbox" onclick="b()" /> &nbsp; I accept the terms and conditions<br />
                </div>
                <button class="button" id="c">
                    ตกลง</button>
            </form>
        </div>
    </div>
</body>
<script>
    
    document.getElementById("c").disabled = true;
    array = [];
    var sty = document.getElementById("c");

    function b() {
        var checkBox = document.getElementById("checkbox");
        if (checkBox.checked == true) {
            document.getElementById("c").disabled = false;
            sty.style.color = "orange";
        } else {
            document.getElementById("c").disabled = true;
            sty.style.color = "black";
        }
    }
    $("button").click(function() {
        var x = document.getElementById("Text").value;
        var y = document.getElementById("radio1").value;
        var q = document.getElementById("radio2").value;
        if (document.getElementById("radio1").checked) {
            array.push([x, y]);
            console.log(array);
        } else {
            array.push([x, q]);
            console.log(array);
        }
    });
</script>

</html>