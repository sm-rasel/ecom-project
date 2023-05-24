<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\SliderSection;
use Illuminate\Http\Request;

class SliderSectionController extends Controller
{
    public function sliderIndex()
    {
        $sliders = SliderSection::all();
        return view('admin.homepage.slider_section',[
            'sliders' => $sliders
        ]);
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
                'button_text'           => 'required',
                'button_url'            => 'required|url',
                'slider_order'          => 'required|numeric',
                'slider_image'          => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048'

            ],
            [
                'slider_description.required'   => 'Description is Required',
                'button_text.required'          => 'Button text is Required',
                'button_url.required'           => 'Button Url is Required',
                'button_url.url'                => 'Button url must be type of Url',
                'slider_image.required'         => 'Image is Required',
                'slider_image.image'            => 'Slider Image must be type of Image',
                'slider_image.mimes'            => 'Slider Image must be jpg, png, jpeg, gif and svg',
                'slider_image.max'              => 'Maximum file Upload size is 10MB',
                'slider_order.required'         => 'Order number is required',
                'slider_order.numeric'          => 'Order number must be type of Number'
            ]
        );
        SliderSection::newSliderSection($request);
        $notification = array(
            'message'       => 'Slider Created Successfully',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/slider-section')->with($notification);
    }

    public function sliderEdit($id)
    {
        $slider = SliderSection::find($id);
        return view('admin.homepage.slider_section_update', [
            'slider' => $slider
        ]);
    }

    public function sliderUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'slider_description'    => 'required',
                'button_text'           => 'required',
                'button_url'            => 'required|url',
                'slider_order'          => 'required|numeric',

            ],
            [
                'slider_description.required'   => 'Description is Required',
                'button_text.required'          => 'Button text is Required',
                'button_url.required'           => 'Button Url is Required',
                'button_url.url'                => 'Button url must be type of Url',
                'slider_order.required'         => 'Order number is required',
                'slider_order.numeric'          => 'Order number must be type of Number'
            ]
        );
        SliderSection::updateSliderSection($request, $id);
        $notification = array(
            'message'       => 'Slider Updated Successfully',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/slider-section')->with($notification);
    }

    public function sliderStatusUpdate($id)
    {
        if (SliderSection::updateSliderStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Slider Status Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Slider Status Could not be Updated !';
            return response()->json($data, 200);
        }
    }
    public function sliderDelete($id)
    {
        if (SliderSection::deleteSlider($id))
        {
            $data['success'] = true;
            $data['message'] = 'Slider Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = "Slider Can't be Deleted !";
            return response()->json($data, 200);
        }
    }


}
