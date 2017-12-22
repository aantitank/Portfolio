<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Home /</a></li>
                    <li><a href="/admin/comment/id">Comment /</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>


            <h4>Edit comment id <?php echo $comment['id']; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Data</p>
                        <input type="text" name="newdate" placeholder="" value="<?php echo $comment['date']; ?>">

                        <p>Product</p>
                        <input type="text" name="products_id" placeholder="" value="<?php echo $comment['products_id']; ?>">
                        
                        <p>User</p>
                        <input type="text" name="user_id" placeholder="" value="<?php echo $comment['user_id']; ?>">

                        <p>Comment</p>
                        <input type="text" name="comment" placeholder="" value="<?php echo $comment['comment']; ?>">
                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

