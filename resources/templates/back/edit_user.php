<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php 
if(isset($_GET['edit_user_id'])) {
    $query = query("SELECT * FROM users WHERE user_id = " . escape_string($_GET['edit_user_id']) . " ");
    confirm($query);
    while($row = fetch_array($query)) {
        $username          = escape_string($row['username']);
        $email    = escape_string($row['email']);
        $password          = escape_string($row['password']);
    }
    update_user();
}

 ?>
<h1 class="page-header">
    Edit User
</h1>
<div class="col-md-6 user_image_box">
<a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="" alt=""></a>
    </div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
        <input type="text" name="email" class="form-control"  value = "<?php echo $email; ?>" >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
        <input type="password" name="password" class="form-control" value = "<?php echo $password; ?>" >

        </div>
            <div class="form-group">
            <a id="user-id" class="btn btn-danger" href="">Delete</a>
            <input type="submit" name="update_user" class="btn btn-primary pull-right" value="Update" >
        </div>
    </div>
</form>





    