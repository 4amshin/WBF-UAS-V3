<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardContentModel extends Model {
    protected $table = 'dashboard-content';
    protected $primaryKey = 'id';
    protected $allowedFields = ['menu_id', 'title', 'content'];
}

?>