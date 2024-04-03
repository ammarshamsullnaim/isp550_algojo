<?php

include 'db_connect.php';

function getStaffType($type)
{
    $types = ["", "Admin", "Staff"];
    return $types[$type];
}

$staff = $conn->query("SELECT * FROM staff ORDER BY name ASC");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" id="new_staff"><i class="fa fa-plus"></i> New staff</button>
        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><b>Staff List</b></div>
            <div class="card-body">
                <table class="table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = $staff->fetch_assoc()) :
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $i++ ?>
                                </td>
                                <td>
                                    <?php echo ucwords($row['name']) ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['username'] ?>
                                </td>
                                <td>
                                    <?php echo getStaffType($row['type']) ?>
                                </td>
                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm">Action</button>
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit_staff" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'>Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete_staff" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'>Delete</a>
                                            </div>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('table').dataTable();
    $('#new_staff').click(function() {
        uni_modal('New Staff', 'manage_staff.php');
    });
    $('.edit_staff').click(function() {
        uni_modal('Edit Staff', 'manage_staff.php?id=' + $(this).attr('data-id'));
    });
    $('.delete_staff').click(function() {
        _conf("Are you sure you want to delete this staff?", "delete_staff", [$(this).attr('data-id')]);
    });

    function delete_staff($id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_staff',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                }
            }
        });
    }
</script>
