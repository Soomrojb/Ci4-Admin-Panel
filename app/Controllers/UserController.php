<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Common;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->common = new Common;
    }
    
    /**
     * signup functionality not available
     */
    public function signup()
    {}
    
    /**
     * logic and show dashboard with respect to permissions
     */
    public function login()
    {
        $data = [];
        $data['theme'] = $this->theme;

        if ($this->request->getMethod() == 'get')
        {
            return view("theme/".$this->theme."/auth/login", $data);
        }
        
        $rules = [
            'email' => 'required|min_length[7]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[25]'
        ];
        
        $vdata = $this->request->getPost(array_keys($rules));        
        if (!$this->validateData($vdata,$rules))
        {
            return redirect()->back()->withInput();
        }

        if ( isset($vdata['email']) && isset($vdata['password']) )
        {
            $validity = $this->common->validateuser($vdata['email']);
            if ($validity)
            {
                if (password_verify($vdata['password'], $validity[0]->password))
                {
                    $permissions = array();
                    $perms = $this->common->getuserpermissions($validity[0]->id);
                    foreach ($perms as $perm)
                    {
                        array_push($permissions,$perm->slug);
                    }
                    session()->set('isloggedin',true);
                    session()->set( (array) $validity[0] );
                    session()->set('permissions',$permissions);
                    return redirect()->to(route_to('admindashboard'));
                }
            }
        }
    }

    /**
     * logout and redirect to login page
     */
    public function logout()
    {
        $data = [];
        $data['theme'] = $this->theme;
        session()->destroy();
        return redirect()->to(route_to('adminlogin'));
    }

}
