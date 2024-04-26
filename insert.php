<?php
require_once("hader.php");
require_once("db_config.php");


if(isset($_POST['btn'])){
    $name = $_POST["name"];
    $full_Name = $_POST["full_Name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role_id = $_POST["role_id"];
    $ip=$_SERVER["REMOTE_ADDR"];

    $db->query("insert into crud(name,full_Name,email,password,role_id,ip)values('$name','$full_Name','$email','$password','$role_id','$ip')");

    echo "Successfully Created";

}



?>

<a href="view.php">VIEW PAGE</a>
<form method="post">
    <div class="mt-5 ms-5 w-25">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input type="text" name="full_Name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
        </div>
        <select class="form-select" aria-label="Default select example" name="role_id">
            <option selected disabled>Role Name</option>
            <option value="Admin">Admin</option>
            <option value="Moderator">Moderator</option>
            <option value="Member">Member</option>
        </select>
        <button type="submit" class="mt-2 btn btn-info w-100" name="btn">SUBMIT</button>
    </div>
</form>
