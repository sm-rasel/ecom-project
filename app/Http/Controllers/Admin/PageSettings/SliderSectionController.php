<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderSectionController extends Controller
{
    public function sliderIndex()
    {
        return view('admin.homepage.slider_section');
    }

    public function sliderAdd()
    {
        return view('admin.homepage.slider_section_add');
    }
    public function sliderStore(Request $request)
    {
        $request->validate(
            [
                'slider_description'    => 'required',
                'button_url'            => 'required|url',
                'slider_image'          => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048'

            ],
            [
                'slider_description.required'   => 'Description is Required',
                'button_url.required'           => 'Button Url is Required',
                'button_url.url'                => 'Button url must be type of Url',
                'slider_image.required'         => 'Image is Required',
                'slider_image.image'            => 'Slider Image must be type of Image',
                'slider_image.mimes'            => 'Slider Image must be jpg, png, jpeg, gif and svg',
                'slider_image.max'              => 'Maximum file Upload size is 10MB'
            ]
        );
        return $request->all();
    }
}
