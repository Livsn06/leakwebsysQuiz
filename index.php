<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <select name="" id="options">
        <option value="isbn">ISBN</option>
        <option value="title">Title</option>
    </select>
    <input type="text" id="search">

    <div id="fortable"></div>
</body>
</html>


<script>
    $(document).ready(function () {
        $(document).on("keyup", "#search", function(){
        var col = $("#options").val();
        var val = $("#search").val();
            if(val != ""){
                $("#fortable").load("ajax.php", {searchFor: col, searchval: val});
            }else{
                $("#fortable").html("");
            }
               
        });
    });
    </script>