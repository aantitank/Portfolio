<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Home /</a></li>
                        <li class="active">Images</li>
                    </ol>
                </div>

                <h4>List of ismage</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Product id</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($imageList as $image): ?>
                        <tr>
                            <td><?php echo $image['id']; ?></td>
                            <td><?php echo $image['products_id']; ?></td>
                            <td><?php echo $image['image']; ?></td>
                            <td><a href="/admin/image/delete/<?php echo $image['id']; ?>" title="Delete"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>