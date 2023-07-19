<?php 

namespace App\Models;

use CodeIgniter\Model;

class ServiceMenuModel extends Model {
    protected $table = 'service-menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'icon_url'];
}

?>