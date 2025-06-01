<?php
function dashboard($userdata, $userTask)
{
    if (!$userdata) {
        header("Location: /login");
        exit;
    }
?>
    <form method="post">
        <button name="logout_btn" type="submit">Log out</button>
    </form>
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
                        <td><a href="dashboard/deletetask/<?= $item['taskId'] ?>">Delete</a>
                            <?php
                            if ($item['status'] === "not finished") { ?>
                                <a href="dashboard/markdone/<?= $item['taskId'] ?>">Done</a>
                            <?php } else { ?>
                                <a href="dashboard/uncheck/<?= $item['taskId'] ?>">Nevermind</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "user didn't have any task";
    } ?>
<?php }
