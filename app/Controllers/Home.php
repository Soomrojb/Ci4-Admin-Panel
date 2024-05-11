<?php

namespace App\Controllers;
use App\Models\Common;

class Home extends BaseController
{
    public function __construct()
    {
        $this->common = new Common;
    }
    
    public function index(): string
    {
        $data = [];
        $data['theme'] = $this->theme;
        return view("theme/".$this->theme."/homepage", $data);
    }

    public function services(): string
    {
        $data = [];
        $data['theme'] = $this->theme;
        return view("theme/".$this->theme."/services", $data);
    }
    
    public function gallery(): string
    {
        $eventlists = $this->common->getAllEventList();

        $data = [];
        $data['theme'] = $this->theme;
        $data['eventlists'] = $eventlists;
        return view("theme/".$this->theme."/gallery", $data);
    }
    
    public function event($slug)
    {
        $images = $this->common->getEventDetails($slug, 'image');
        $details = $this->common->getEvenDetail($slug);

        $data = [];
        $data['theme'] = $this->theme;
        $data['slug'] = $slug;
        $data['images'] = $images;
        $data['details'] = $details;
        return view("theme/".$this->theme."/gallery-details", $data);
    }

}
