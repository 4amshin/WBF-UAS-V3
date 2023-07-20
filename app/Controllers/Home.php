<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DashboardMenuModel;
use App\Models\DashboardContentModel;
use App\Models\ServiceMenuModel;

helper('data_helper');

class Home extends BaseController
{
    public function index()
    {
        //fetch data fro the homepage
        $homeData = fetch_home_data();
        $aboutData = fetch_about_data();
        $serviceData = fetch_service_data();
        $contactData = fetch_contact_data();
        $footerData = fetch_footer_data();

        $data = array_merge($homeData, $aboutData, $serviceData, $contactData, $footerData);

        return view('home/index', $data);
    }

    public function login()
    {
        //check if there error message in session
        $error = session()->getFlashdata('error');

        return view('auth/login', ['error' => $error]);
    }

    public function dashboard() 
    {
         //load the model
         $dashboardMenuModel = new DashboardMenuModel();

         //get all data from the 'dashboard-menu'
         $data['result'] = $dashboardMenuModel->findAll();
 
         //load the view
         return view('admin/dashboard', $data);
    }

    public function dashboardEditor()
    {
        //check if the user is logged in
        if(!session()->has('username')) {
            return redirect()->to(base_url('login'))->with('error', 'Access Denied');
        }

        $menuId = $this->request->uri->getSegment(2);
        // $menuId = $this->request->getGet('menu_id');

        //check if menu_id exists
        if($menuId) {
            //load the model base on menuId
            if($menuId === 'service-menu') {
                $model = new ServiceMenuModel();

                //menu name
                $bigTitle = "Service Menu";

                //fetch content data from service-menu
                $contentResult = $model->findAll();
            } else {
                $model = new DashboardContentModel();

                //fetch menu name based on menuId
                $titleResult = (new DashboardMenuModel())->where('menu_id', $menuId)->first();
                if(!$titleResult) {
                    return redirect()->to(base_url('dashboard'))->with('error', 'Menu Id Not Found');
                }
                $bigTitle = $titleResult['menu_name'];

                //fetch the content data
                $contentResult = $model->where('menu_id', $menuId)->findAll();
            }

        } else {
            return redirect()->to(base_url('dashboard'))->with('error', 'Menu ID Not Found');
        }

        //prepare data for the view
        $data = [
            'menuId' => $menuId,
            'bigTitle' => $bigTitle,
            'contentResult' => $contentResult,
        ];

        return view('admin/dashboard_editor', $data);
    }
}
