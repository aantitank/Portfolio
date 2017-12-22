<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Home /</a></li>
                    <li><a href="/admin/user">Users /</a></li>
                    <li class="active">Create</li>
                </ol>
            </div>


            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Name</p>
                        <input type="text" name="name" placeholder="" >

                        <p>Email</p>
                        <input type="text" name="email" placeholder="" >

                        <p>Password</p>
                        <input type="text" name="password" placeholder="" >

                        <p>Role</p>
                        <select name="role">
                            <option value="admin"> Admin</option>
                            <option value="user"> User</option>
                        </select>
                        <p>Avatart</p>
                        <input type="file" name="image" placeholder="" >
                        
                        <p>Black list</p>
                        <select name="blocked">
                            <option value="1" >Blocked</option>
                            <option value="0" >Active</option>
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

