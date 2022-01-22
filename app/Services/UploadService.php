<?php

namespace App\Services;

class UploadService
{
    public static function upload($request)
    {
        $request->imagem->storeAs('public', $request->imagem->getClientOriginalName());
        return '/storage/' . $request->imagem->getClientOriginalName();
    } 
}