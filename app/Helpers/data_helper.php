<?php

use App\Models\DashboardContentModel;
use App\Models\ServiceMenuModel;


/*===Home Section===*/
if(!function_exists('fetch_home_data')) {
    function fetch_home_data()
    {
        $dashboardContentModel = new DashboardContentModel();

        //fetch home data
        $homeText = $dashboardContentModel->where('menu_id', 'home-menu')
            ->whereIn('title', ['Description', 'Hero Image'])
            ->findAll();

        //process the fetched data
        $homeTextData = [];
        $heroImage = "No Image Found";

        foreach ($homeText as $data) {
            if($data['title'] == 'Description') {
                $homeTextData['homeText'] = $data['content'];
            } elseif ($data['title'] == 'Hero Image') {
                $heroImage = $data['content'];
            }
        }

        return [
            'homeTextData' => $homeTextData,
            'heroImage' => $heroImage,
        ];
    }
}

/*===About Section===*/
if(!function_exists('fetch_about_data')) {
    function fetch_about_data()
    {
        $dashboardContentModel = new DashboardContentModel();

        //fetch about data
        $aboutData = $dashboardContentModel->where('menu_id', 'about-menu')
            ->whereIn('title', ['Description', 'Left Side Image', 'Card Icon', 'Card Text'])
            ->findAll();

        //process the fetched data
        $aboutText = "No Description";
        $aboutImage = "No Image";
        $aboutCardIcon = "No Icon";
        $aboutCardText = "No Text";
        
        foreach ($aboutData as $data) {
            if ($data['title'] == 'Description') {
                $aboutText = $data['content'];
            } elseif ($data['title'] == 'Left Side Image') {
                $aboutImage = $data['content'];
            } elseif ($data['title'] == 'Card Icon') {
                $aboutCardIcon = $data['content'];
            } elseif ($data['title'] == 'Card Text') {
                $aboutCardText = $data['content'];
            }
        }

        return [
            'aboutText' => $aboutText,
            'aboutImage' => $aboutImage,
            'aboutCardIcon' => $aboutCardIcon,
            'aboutCardText' => $aboutCardText,
        ];
    }
}

/*===Service Section===*/
if(!function_exists('fetch_service_data')) {
    function fetch_service_data()
    {
        $serviceMenuModel = new ServiceMenuModel();

        //fetch service data
        $serviceCards = $serviceMenuModel->findAll();

        return [
            'serviceCards' => $serviceCards,
        ];
    }
}

/*===Contact Section===*/
if (!function_exists('fetch_contact_data')) {
    function fetch_contact_data()
    {
        $dashboardContentModel = new DashboardContentModel();

        // Fetch contact data
        $contactData = $dashboardContentModel->where('menu_id', 'contact-menu')
            ->findAll();

        return [
            'contacts' => $contactData,
        ];
    }
}

/*===Footer Section===*/
if(!function_exists('fetch_footer_data')) {
    function fetch_footer_data()
    {
        $dashboardContentModel = new DashboardContentModel();

        //fetch footer data
        $footerData = $dashboardContentModel->where('menu_id', 'img-menu')
            ->where('title', 'Footer Stakeholder White Logo')
            ->first();
            
        return [
            'footerLogo' => $footerData ? $footerData['content'] : "No Data",
        ];
    }
}
