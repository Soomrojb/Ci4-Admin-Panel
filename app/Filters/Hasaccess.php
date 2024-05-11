<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Hasaccess implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // print_r ( $arguments[0] );
        // die();

        /** make sure we are logged-in */
        if (!session()->get('isloggedin'))
        {
            return redirect()->to(route_to('adminlogin'));
        }

        if ( in_array("super-admin", session()->get('permissions')) || in_array($arguments[0], session()->get('permissions')) )
        {
            return;
        } else {
            return redirect()->to(route_to('admindashboard'));
        }
    }

    // if (session()->get('isloggedin') && session()->get('is_admin') == '1') {
    //     if (!in_array($arguments[0], session()->get('permissions'))) {
    //         if (in_array('super-admin', session()->get('permissions'))) {
    //             return;
    //         }
    //         return redirect()->to(route_to('sitepanel_dashboard'));
    //     } else {
    //         return;
    //     }
    // } else {
    //     return redirect()->to(route_to('admin-login'));
    // }


    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
