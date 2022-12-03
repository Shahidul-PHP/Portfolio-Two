<?php
session_start();
require '../login_auth.php';
require '../db.php';

$select_all_users = "SELECT * FROM users";
$users_query = mysqli_query($db_connection, $select_all_users);



?>

<?php require '../dashboard_parts/Header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Users List</h2>
                    <?php if (isset($_SESSION['done'])) { ?>
                        <strong class="text-success"><?= $_SESSION['done'] ?></strong>
                    <?php }
                    unset($_SESSION['done']); ?>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>User Role</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($users_query as $sl => $users) { ?>
                            <tr>
                                <td><?= $sl + 1 ?></td>
                                <td><?= $users['user_name'] ?></td>
                                <td><?= $users['email'] ?></td>
                                <td>
                                    <?php if ($users['img'] == null) { ?>
                                        <p>No Uploaded Image Found for this User</p>
                                    <?php } else { ?>
                                        <img width="80" src="../Uploads/Admin/<?= $users['img'] ?>" alt="">
                                    <?php } ?>

                                </td>
                                <td>
                                    <?php if ($users['user_role'] == 1) { ?>
                                        <strong>Super Admin</strong>
                                    <?php } else { ?>
                                        <strong>User</strong>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="edit_user.php?id=<?= $users['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                                    <button data-id="delete.php?id=<?= $users['id'] ?>" class="delete-btn btn btn-warning btn-sm"><i class="fa-sharp fa-solid fa-trash"></i></button>

                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require '../dashboard_parts/Footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.delete-btn').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                link = $(this).attr('data-id');
                window.location.href = link;
            }
        })
    });
</script>

<?php if (isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire(
            'Deleted!',
            '<?= $_SESSION['success'] ?>',
            'success'
        )
    </script>
<?php }
unset($_SESSION['success']) ?>