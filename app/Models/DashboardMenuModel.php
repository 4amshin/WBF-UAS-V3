<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardMenuModel extends Model {
    protected $table = 'dashboard-menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['menu_name', 'menu_id'];
}

?>