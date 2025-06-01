<?php
function dashboard($userdata, $userTask)
{
    if (!$userdata) {
        header("Location: /login");
        exit;
    }
?>
    <form method="post">
        <input type="text" placeholder="input task" name="task_name">
        <button name="create_task_btn" type="submit">Create task</button>
    </form>
    <br>
    <?php
    if ($userTask) { ?>
        <table border="">
            <thead>
                <th>Task name</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                foreach ($userTask as $item) { ?>
                    <tr>
                        <td><?= $item['task_name'] ?></td>
                        <td><?= $item['status'] ?></td>
                        <td><a href="dashboard/deletetask/<?= $item['taskId'] ?>">Delete</a> <a href="">Done</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "user didn't have any task";
    } ?>
<?php }
