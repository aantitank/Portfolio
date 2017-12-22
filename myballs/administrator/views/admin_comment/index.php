<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Home /</a></li>
                    <li class="active"><a href="/admin/comment/id">Comment</a></li>
                </ol>
            </div>
			<p>
		        <form action="#" method="post">
		            <p>Search by email</p>
		            <input type="text" name="email" placeholder="" >
		            <input type="submit" name="submit" class="btn btn-default" value="Search">
				</form>
		        <form action="#" method="post">
		            <p>Search by product name</p>
		            <input type="text" name="product_name" placeholder="" >
		            <input type="submit" name="submitProd" class="btn btn-default" value="Search">
				</form>
			</p>
            <h4>List of comments</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th><a href="/admin/comment/id">ID</a></th>
                    <th><a href="/admin/comment/date">Data</a></th>
                    <th><a href="/admin/comment/products_id">Product</a></th>
                    <th>User</th>
                    <th>Comment</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($commentList as $comment): ?>
                    <tr>
                        <td><?php echo $comment['id']; ?></td>
                        <td><?php echo $comment['date']; ?></a></td>
                        <td><?php echo Product::getProductById($comment['products_id'])['name']; ?></a></td>
                        <td><?php echo User::getUserById($comment['user_id'])['email']; ?></td>
                        <td><?php echo $comment['comment']; ?></td>  
                        <td><a href="/admin/comment/update/<?php echo $comment['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/comment/delete/<?php echo $comment['id']; ?>" title="Delete"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

