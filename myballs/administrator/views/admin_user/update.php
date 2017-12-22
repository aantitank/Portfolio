<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Home /</a></li>
                    <li><a href="/admin/user">Users /</a></li>
                    <li class="active">Edit user</li>
                </ol>
            </div>


            <h4>Edit user with email<?php echo $user['email']; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Name</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">

                        <p>Email</p>
                        <input type="text" name="email" placeholder="" value="<?php echo $user['email']; ?>">

                        <p>Password</p>
                        <input type="text" name="password" placeholder="" value="<?php echo $user['password']; ?>">

                        <p>Role</p>
                        <select name="role">
                            <option value="admin" <?php if ($user['role'] == "admin") echo ' selected="selected"'; ?>>Admin</option>
                            <option value="user" <?php if ($user['role'] == "user") echo ' selected="selected"'; ?>>User</option>
                        </select>

                        <p>Avatar</p>
                        <img src="<?php echo $user["image"]; ?>" width="200" alt="" />
                        <div>
                        <input type="file" name="image" placeholder="" value="<?php echo $user["image"]; ?>"></div>
                        <p>Status</p>
                        <select name="black_list">
                            <option value="1" <?php if ($user['black_list'] == 1) echo ' selected="selected"'; ?>>Black_list</option>
                            <option value="0" <?php if ($user['black_list'] == 0) echo ' selected="selected"'; ?>>Active</option>
                        </select>

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

