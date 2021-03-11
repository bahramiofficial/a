<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>
<body>
<form action="{{ route('test.store') }}" method="post">
     @csrf
    <div class="container">

        <div>
            <label for="category">category</label>
            <input type="text" name="category" id="category">
        </div>
        <br>
        <div>
            <label for="name">name</label>
            <input type="text" name="name" id="name">
        </div>
        <br>
        <div>
            <label for="family">family</label>
            <input type="text" name="family" id="family">
        </div>
        <br>
        <div>
            <label for="numberid">numberid</label>
            <input type="text" name="numberid" id="numberid">
        </div>
        <br>
        <div>
            <label for="nationalcode">nationalcode</label>
            <input type="text" name="nationalcode" id="nationalcode">
        </div>
        <br>
        <div>
            <label for="born_at">born_at</label>
            <input type="text" name="born_at" id="born_at">
        </div>
        <br>
        <div>
            <label for="phone">phone</label>
            <input type="text" name="phone" id="phone">
        </div>
        <br>
        <div>
            <label for="mobile">mobile</label>
            <input type="text" name="mobile" id="mobile">
        </div>
        <br>
        <div>
            <label for="maritalstatus">maritalstatus</label>
            <input type="text" name="maritalstatus" id="maritalstatus">
        </div>
        <br>
        <div>
            <label for="gender">gender</label>
            <input type="text" name="gender" id="gender">
        </div>
        <br>
        <div>
            <label for="militaryservice">militaryservice</label>
            <input type="text" name="militaryservice" id="militaryservice">
        </div>
        <br>
        <div>
            <label for="nationality">nationality</label>
            <input type="text" name="nationality" id="nationality">
        </div>
        <br>
        <div>
            <label for="religion">religion</label>
            <input type="text" name="religion" id="religion">
        </div>
        <br>
        <div>
            <label for="startupname">startupname</label>
            <input type="text" name="startupname" id="startupname">
        </div>
        <br>
        <div>
            <label for="startupdesc">startupdesc</label>
            <input type="text" name="startupdesc" id="startupdesc">
        </div>
        <br>
        <div>
            <label for="startupproblem">startupproblem</label>
            <input type="text" name="startupproblem" id="startupproblem">
        </div>
        <br>
        <div>
            <label for="startupfounders">startupfounders</label>
            <input type="text" name="startupfounders" id="startupfounders">
        </div>
        <br>
        <div>
            <label for="startupcustomer">startupcustomer</label>
            <input type="text" name="startupcustomer" id="startupcustomer">
        </div>
        <br>
        <div>
            <label for="startuprival">startuprival</label>
            <input type="text" name="startuprival" id="startuprival">
        </div>
        <br>
        <div>
            <label for="startupsocialnetwork">startupsocialnetwork</label>
            <input type="text" name="startupsocialnetwork" id="startupsocialnetwork">
        </div>
        <br>
        <div>
            <label for="startupusersupport">startupusersupport</label>
            <input type="text" name="startupusersupport" id="startupusersupport">
        </div>
        <br>

        <input type="submit" value="send">


    </div>
</form>
</body>
</html>




















