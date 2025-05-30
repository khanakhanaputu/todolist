<?php
getFile("models\Model.model.php");
getFile("views\dashboard.view.php");
class DashboardController extends Model
{
    public function index()
    {
        changeTitle("Dashboard");
        dashboard();
    }
}
