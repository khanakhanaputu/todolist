<?php
function dashboard($userdata, $userTask)
{
    if (!$userdata) {
        header("Location: /login");
        exit;
    }
?>
<form method="post">
    <div class="w-1/2 mx-auto flex justify-between mt-10 gap-2">
        <input class="px-3 py-2 border w-8/12 rounded-lg" type="text" placeholder="input task" name="task_name">
        <div class="flex w-4/12 justify-between">
            <button name="create_task_btn" class="px-3 py-2 rounded-lg bg-green-700 text-white" type="submit">Create
                task</button>
            <button class="px-3 py-2 border rounded-lg bg-red-700 border-red-800 text-white" name="logout_btn"
                type="submit">Log
                out</button>
        </div>
    </div>
</form>

<br>
<?php
    if ($userTask) {
        usort($userTask, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        $limit = 0;
    ?>
<div class="overflow-x-auto rounded-lg shadow-md w-1/2 mx-auto">
    <table class="min-w-full table-fixed divide-y divide-gray-200 text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs uppercase text-gray-500">
            <tr>
                <th class="px-4 py-3 w-1/4">Task</th>
                <th class="px-4 py-3 w-1/4">Status</th>
                <th class="px-4 py-3 w-1/4">Created At</th>
                <th class="px-4 py-3 w-1/4 text-right">Action</th>
            </tr>
        </thead>
        <tbody id="task-body" class="divide-y divide-gray-200 bg-white">
            <?php foreach ($userTask as $item) { ?>
            <tr>
                <td class="px-4 py-4 truncate overflow-hidden whitespace-nowrap"><?= $item['task_name'] ?></td>
                <td class="px-4 py-4">
                    <span
                        class="inline-block rounded-full  px-3 py-1 text-xs font-semibold truncate <?= ($item['status'] === 'Done') ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100 ' ?>">
                        <?= $item['status'] ?>
                    </span>
                </td>
                <td class="px-4 py-4 truncate whitespace-nowrap" data-created-at="<?= $item['created_at'] ?>">
                    <?= $item['created_at'] ?></td>
                <td class="px-4 py-4 text-right space-x-2">
                    <a class="text-red-600 hover:text-red-900 font-medium"
                        href="dashboard/deletetask/<?= $item['taskId'] ?>">Delete</a>
                    <?php if ($item['status'] === "not finished") { ?>
                    <a class="text-indigo-600 hover:text-indigo-900 font-medium"
                        href="dashboard/markdone/<?= $item['taskId'] ?>">Done</a>
                    <?php } else { ?>
                    <a class="text-indigo-600 hover:text-indigo-900 font-medium"
                        href="dashboard/uncheck/<?= $item['taskId'] ?>">Nevermind</a>
                    <?php } ?>
                </td>
            </tr>
            <?php
                        $limit++;
                        if ($limit >= 10) {
                            exit;
                        }
                    } ?>
        </tbody>
    </table>
</div>

<?php } else {
        echo "<h1 class='text-center font-bold text-2xl'>You didn't have any task</h1>";
    } ?>
<?php }