<?php

namespace App\Controllers;

use CodeIgniter\Controller;

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
        return view('auth/login');
    }

    public function dashboard() 
    {
        return view('admin/dashboard');
    }
}
