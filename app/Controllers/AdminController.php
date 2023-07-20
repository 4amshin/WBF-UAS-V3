<?php

namespace App\Controllers;

use App\Models\DashboardContentModel;
use App\Models\ServiceMenuModel;

class AdminController extends BaseController
{

    public function doEdit()
    {
        echo "Entering DoEdit";

        // Check if the user is logged in
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'))->with('error', 'Access Denied');
        } else {
            echo "<br>User Exists";
        }


        //get menu id
        $menuId = $this->request->getPost('menu_id');
       
        // Update for service-menu (Title and Icon URL)
        if ($menuId === 'service-menu') {

            echo "Service Menu Function Selected";

            $titles = $this->request->getPost('titles');
            $iconUrls = $this->request->getPost('iconUrls');



            $serviceModel = new ServiceMenuModel();

            foreach ($titles as $id => $title) {
                $title = htmlspecialchars($title);
                $iconUrl = htmlspecialchars($iconUrls[$id]);

                echo "Updating Service Menu with id $id, Title: $title, Icon URL: $iconUrl";

                $serviceModel->update($id, [
                    'title' => $title,
                    'icon_url' => $iconUrl,
                ]);
            }

            // Display success message
            session()->setFlashdata('success', 'Service Menu Update Success');
        
        } else {
            echo "Public Menu Function Selected";
            // Update for dashboard-content (Content)
            $contents = $this->request->getPost('contents');

            $contentModel = new DashboardContentModel();

            foreach ($contents as $id => $content) {
                $content = htmlspecialchars($content);

                echo "Updating Service Menu with id $id, Content: $content";

                $contentModel->update($id, [
                    'content' => $content,
                ]);
            }
        }

        return redirect()->to(base_url('dashboard'));
    }
}
