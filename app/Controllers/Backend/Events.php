<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Common;

class Events extends BaseController
{
    public function __construct()
    {
        $this->common = new Common;
    }

    /**
     * view events
     */
    public function view_event()
    {
        $events = $this->common->getAllEventList();
        $data = [];
        $data['theme'] = $this->theme;
        $data['events'] = $events;
        return view("theme/".$this->theme."/dashboard/events/view_events", $data);
    }
    
    /** Delete event */
    public function delete_event($id)
    {
        $this->common->delete_event($id);
        return redirect()->route('viewevents');
    }
    
    /**
     * add events
     */
    public function add_event()
    {
        $data = [];
        $data['theme'] = $this->theme;
        
        if ($this->request->getMethod() == 'get')
        {
            $categories = $this->common->getAllCategories();
            $data['categories'] = $categories;
            return view("theme/".$this->theme."/dashboard/events/add_event", $data);
        }
        
        $vdata = $this->request->getPost();
        // echo "<pre>";
        // print_r( $vdata );
        // echo "</pre>";
        // die();
        
        /** register event */
        $id = $this->common->addEvent($vdata);

        /** upload files and add entry in database */
        $filesUploaded = 0;
        if($this->request->getFileMultiple('fileuploads'))
        {
            $files = $this->request->getFileMultiple('fileuploads');
            foreach ($files as $file)
            {
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newname = $file->getRandomName();
                    $filepath = "theme/".$this->theme."/images/events/";
                    $file->move($filepath,$newname);
                    $data = [
                        'uid' => $id,
                        'actual_fname' => $file->getClientName(),
                        'filename' => $newname,
                        'type' => $file->getClientExtension()
                    ];
                    $this->common->addEventImage($data);
                    $filesUploaded++;
                }
            }
        }
        
        $events = $this->common->getAllEventList();
        $data['events'] = $events;
        return redirect()->route('viewevents');
    }

    /**
     * update events (get)
     */
    public function update($id)
    {
        $data = [];
        $data['theme'] = $this->theme;
        $data['id'] = $id;

        if ($this->request->getMethod() == 'get')
        {
            $categories = $this->common->getAllCategories();
            $details = $this->common->getEventDetailsByID($id);
            $oldfiles = $this->common->getEventImagesByID($id);
            $data['categories'] = $categories;
            $data['details'] = $details;
            $data['oldfiles'] = $oldfiles;
            return view("theme/".$this->theme."/dashboard/events/update_event", $data);
        }
        
        $vdata = $this->request->getPost();

        /** update basic details */
        $this->common->updateEvent($vdata);
        
        /** upload files and add entry in database */
        $filesUploaded = 0;
        if($this->request->getFileMultiple('fileuploads'))
        {
            $files = $this->request->getFileMultiple('fileuploads');
            foreach ($files as $file)
            {
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newname = $file->getRandomName();
                    $filepath = "theme/".$this->theme."/images/events/";
                    $file->move($filepath,$newname);
                    $data = [
                        'uid' => $id,
                        'actual_fname' => $file->getClientName(),
                        'filename' => $newname,
                        'type' => $file->getClientExtension()
                    ];
                    $this->common->addEventImage($data);
                    $filesUploaded++;
                }
            }
        }
        
        /**
         * remove unselected old images from database
         * missing: remove files
        */
        $roldfiles = join(",",array_keys($vdata['oldfile']));
        $this->common->deleteEventOldFiles($id,$roldfiles);
        
        $events = $this->common->getAllEventList();
        $data['events'] = $events;
        return redirect()->route('viewevents');
    }
    
    /**
     * update events (post)
     */
    public function update_event()
    {
        // echo "<pre>";
        // $vdata = $this->request->getPost(array_keys($rules));
        // print_r( $vdata );
        // echo "</pre>";
        // $data = [];
        // $data['theme'] = $this->theme;
        // return view("theme/".$this->theme."/dashboard/events/update_event", $data);
    }


    /**
     * view event categories
     */
    public function view_categories()
    {
        $categories = $this->common->getAllCategories();
        $data = [];
        $data['theme'] = $this->theme;
        $data['categories'] = $categories;
        return view("theme/".$this->theme."/dashboard/events/view_categories", $data);
    }

    /** Delete category */
    public function delete_category($id)
    {
        $this->common->delete_category($id);
        return redirect()->route('viewcategories');
    }
    
    /**
     * add category
     */
    public function add_category()
    {
        $data = [];
        $data['theme'] = $this->theme;
        if ($this->request->getMethod() == 'get')
        {
            return view("theme/".$this->theme."/dashboard/events/add_category", $data);
        }
        
        $vdata = $this->request->getPost();
        if ($this->request->getFile('userfile')) {
            $img = $this->request->getFile('userfile');
            if ($img->isValid() && ! $img->hasMoved())
            {
                $newname = $img->getRandomName();
                $filepath = "theme/".$this->theme."/images/events/";
                $img->move($filepath,$newname);
                $data = [
                    'actual_file' => $img->getClientName(),
                    'filename' => $newname,
                    'title' => $vdata['title'],
                    'slug' => url_title(convert_accented_characters($vdata['title']),'-',true)
                ];
                $this->common->addCategory($data);
            }
        }

        $categories = $this->common->getAllCategories();
        $data['categories'] = $categories;
        return redirect()->route('viewcategories');
    }

    /**
     * update category
     */
    public function update_category($id)
    {
        echo "Demonstration";
        // $data = [];
        // $data['theme'] = $this->theme;
        // return view("theme/".$this->theme."/dashboard/events/add", $data);
    }

}