<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Home /</a></li>
                    <li class="active">Users</li>
                </ol>
            </div>

        	<a href="/admin/user/create" class="btn btn-default back"><i class="fa fa-plus"></i> Add user</a>
            <h4>List of users</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Avatar</th>
                    <th>Black list</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($userList as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>

						<?php if ($user['role'] == "admin"): ?>
                            <td><?php echo "Администратор"; ?></td>
						<?php else: ?>
                            <td><?php echo "Пользователь"; ?></td>
					    <?php endif; ?>

						<td><?php echo $user['image']; ?></td>
						<?php if ($user['black_list']): ?> <td><?php echo "Заблокирован"; ?></td>
						<?php else: ?> <td><?php echo "Активен"; ?></td>
					    <?php endif; ?>
                        <td><a href="/admin/user/update/<?php echo $user['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/user/delete/<?php echo $user['id']; ?>" title="Delete"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

