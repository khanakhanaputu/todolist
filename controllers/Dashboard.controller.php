<?php
getFile("models\Model.model.php");
getFile("views\dashboard.view.php");
class DashboardController extends Model
{
    public function index()
    {
        changeTitle("Dashboard");
        session_start();
        $get_user_task = $this->getAllById("activities", "userid", $_SESSION['userData']['userid']);


        if (isset($_POST['create_task_btn'])) {
            $this->createTask();
        }
        if (isset($_POST['logout_btn'])) {
            session_destroy();
            header("Location: /login");
        }

        dashboard($_SESSION['userData'], $get_user_task);
    }
    private function deleteTask($taskid)
    {
        $task_data = $this->getSingleById("activities", "taskId", "$taskid");
        session_start();
        if ($task_data['userid'] === $_SESSION['userData']['userid']) {
            $this->delete("activities", "taskId", "$taskid");
            header("Location: /dashboard");
            exit;
        }
        header("Location: /dashboard");
    }
    private function createTask()
    {
        try {
            $task_name = $_POST['task_name'];
            $userid = $_SESSION['userData']['userid'];
            $this->createSpecify("activities", ["task_name", "userid"], ["'$task_name'", "$userid"]);
            header("Location: dashboard");
            exit;
        } catch (\Throwable $th) {
            header("Location: /dashboard");
        }
    }

    public function markdone($taskid)
    {
        session_start();
        $task_data = $this->getSingleById("activities", "taskId", "$taskid");
        if ($task_data['userid'] === $_SESSION['userData']['userid']) {
            $this->updateSingle("activities", "status", "Done", "taskId", "$taskid");
            header("Location: /dashboard");
            exit;
        }
    }

    public function uncheck($taskid)
    {
        session_start();
        $task_data = $this->getSingleById("activities", "taskId", "$taskid");
        if ($task_data['userid'] === $_SESSION['userData']['userid']) {
            $this->updateSingle("activities", "status", "not finished", "taskId", "$taskid");
            header("Location: /dashboard");
            exit;
        }
    }
}
