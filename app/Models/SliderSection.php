<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'slider_sections';
    protected $fillable = ['slider_description','button_text','button_url', 'slider_order', 'slider_image', 'status'];

    public static $sliderSction, $image, $imageName, $imageUrl, $text, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('slider_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'slider_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newSliderSection($request)
    {
        self::$sliderSction                         = new SliderSection();
        self::$sliderSction->slider_description     = $request->slider_description;
        self::$sliderSction->button_text            = $request->button_text;
        self::$sliderSction->button_url             = $request->button_url;
        self::$sliderSction->slider_order           = $request->slider_order;
        self::$sliderSction->slider_image           = self::getImageUrl($request);
        self::$sliderSction->status                 = 1;
        self::$sliderSction->save();
    }

    public static function updateSliderSection($request, $id)
    {
        self::$sliderSction = SliderSection::find($id);
        if ($request->file('slider_image'))
        {
            if (file_exists(self::$sliderSction->slider_image))
            {
                unlink(self::$sliderSction->slider_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$sliderSction->slider_image;
        }
        self::$sliderSction->slider_description     = $request->slider_description;
        self::$sliderSction->button_text            = $request->button_text;
        self::$sliderSction->button_url             = $request->button_url;
        self::$sliderSction->slider_order           = $request->slider_order;
        self::$sliderSction->slider_image           = self::$imageUrl;
        self::$sliderSction->update();
    }

    public static function updateSliderStatus($id)
    {
        self::$sliderSction = SliderSection::findOrFail($id);
        if (self::$sliderSction->status == 1)
        {
            self::$sliderSction->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$sliderSction->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    public static function deleteSlider($id)
    {
        self::$sliderSction = SliderSection::find($id);
        if (self::$sliderSction)
        {
            if (file_exists(self::$sliderSction->slider_image))
            {
                unlink(self::$sliderSction->slider_image);
            }
            self::$sliderSction->delete();
            return true;
        }
        else
        {
            return false;
        }

    }
}
