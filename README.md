KBSlideshow
----
Slideshow module for SilverStripe 3.1+ that implements back-end support for slideshows/carousels/sliders. For the sake of demonstration it comes with an plug-and-play example using [slick](https://github.com/kenwheeler/slick). It can easily be removed without disrupting functionality. More about this further down under the [slick](https://github.com/kreationsbyran/KBSlideshow#Slick) heading.


### Installation
As a general rule of thumb it can be a good idea to back up your database and log into your site as Admin before installing modules, so even though nothing should break, feel free to do so.
##### Using Composer

1. Open a terminal and `cd` to your SilverStripe root.
2. Run `composer require kreationsbyran/kb-slideshow`.
3. Go to http://your.site/dev/build?flush

##### Manually
1. Download the zipped master branch ([here](https://github.com/kreationsbyran/KBSlideshow/archive/master.zip)).
2. Move the contents into the root directory of your SilverStripe installation.
3. Go to http://your.site/dev/build?flush


### Usage
##### In Template
Using `<% include KBSlideshow %>` in your SilverStripe template will include the default template. You can easily replace or edit this template.

    /templates/includes/KBSlideshow.ss markup ouput
    
    ├──div.kbslideshow (if exists)
    |  └──div.kbslide  (loop)
    |     ├──img       (if exists)
    |     ├──h1        (if exists)
    |     └──p         (if exists)


##### In CMS
The module extends Page and once installed it will create a tab called "Slideshow" in the CMS of all Pages. "Image rescale width/height" will set the ratio of all slides to width:height if both options are set. If only one is set, the images will be cropped using SilverStripes `Image.SetWidth()` or `Image.SetHeight()` functions. If none are set the selected image won't be rescaled or cropped and can result in heavy load. Recommended to set at least one if slideshow contains images.


### Slick
As mentioned in the introduction the module comes bundled with a demonstration using [slick](https://github.com/kenwheeler/slick). To remove the coupling between the module and slick in order to use another slideshow/slider/carousel library, simply follow these two steps:

1. Remove `/templates/includes/KBSlick.ss`.
2. (Optional) Remove `<% include KBSlick %>` from `/templates/includes/KBSlideshow.ss`.


### Dependencies
* SilverStripe (tested on 3.1)


### License
Copyright (c) 2015 Kreationsbyrån Sverige AB

Licensed under the MIT License
