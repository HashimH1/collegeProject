<?php


define('PAGINATE',15);

function getLocalLang()
{
    return App()->getLocale() =="ar" ?"css-rtl":"css";
}

function getLocalLangFront()
{
    return App()->getLocale() =="ar" ?"-rtl":"";
}

function saveImage($folder,$Image)
{

    $Image->store('/',$folder);
    $imageName = $Image->hashName();
    return $imageName;
}

function deleteImage($image)
{
    $banner = base_path('assets/images/' . $image);
    unlink($banner);
}
