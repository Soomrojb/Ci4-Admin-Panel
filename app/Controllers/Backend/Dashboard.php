<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Common;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index()
    {
        $eventcount = $this->common->getEvenstCount();
        
        $data = [];
        $data['theme'] = $this->theme;
        $data['eventcount'] = $eventcount;
        return view("theme/".$this->theme."/dashboard/index", $data);
    }
}
