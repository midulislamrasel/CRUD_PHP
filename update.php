<?php
require_once("db_config.php");
require_once("hader.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $result = $db->query("SELECT * FROM crud WHERE id = '$id'");
    $row = $result->fetch_object();

    if(isset($_POST["btn"])){
        $name = $_POST["name"];
        $full_Name = $_POST["full_Name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role_id = $_POST["role_id"];
        $ip = $_SERVER["REMOTE_ADDR"];
    
        // Update query with the WHERE clause
        $db->query("UPDATE crud SET name ='$name', full_Name ='$full_Name', email ='$email', password ='$password', role_id ='$role_id' WHERE id = '$id'");

        echo "Successfully Updated";
    }
}

?>

<a href="view.php">Back to VIEW</a>
<form method="post">
    <div class="mt-5 ms-5 w-25">
        <!-- Form fields with pre-filled data -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input 
            type="text" 
            name="name" 
            class="form-control" 
            id="exampleFormControlInput1" 
            value="<?php echo isset($row->name) ? $row->name : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input 
            type="text" 
            name="full_Name" 
            class="form-control" 
            id="exampleFormControlInput1" 
            value="<?php echo isset($row->full_Name) ? $row->full_Name : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input 
            type="email" 
            name="email" 
            class="form-control" 
            id="exampleFormControlInput1" 
            value="<?php echo isset($row->email) ? $row->email : "" ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input 
            type="password" 
            name="password" 
            class="form-control" 
            id="exampleFormControlInput1" 
            value="<?php echo isset($row->password) ? $row->password : "" ?>">
        </div>
        <!-- Dropdown with dynamically selected option -->
        <select class="form-select" aria-label="Default select example" name="role_id">
            <option selected disabled>Role Name</option>
            <option value="Admin" <?php echo isset($row->role_id) && $row->role_id == "Admin" ? "selected" : "" ?>>Admin</option>
            <option value="Moderator" <?php echo isset($row->role_id) && $row->role_id == "Moderator" ? "selected" : "" ?>>Moderator</option>
            <option value="Member" <?php echo isset($row->role_id) && $row->role_id == "Member" ? "selected" : "" ?>>Member</option>
        </select>
        <button type="submit" class="mt-2 btn btn-info w-100" name="btn">SUBMIT</button>
    </div>
</form>
