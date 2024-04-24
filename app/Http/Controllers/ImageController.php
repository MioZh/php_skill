<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Servises\ImageService;

class ImageController extends Controller
{
    public function store(Request $request, $id)
    {
        // Проверяем, был ли передан файл
        if ($request->hasFile('image')) {
            $image = new ImageService();
            $image = $image -> stor($request, $id);

            return response()->json(['message' => 'Изображение успешно сохранено'], 200);
        } else {
            return response()->json(['message' => 'Файл изображения не был передан'], 400);
        }
    }

    public function getUserImage($userId)
    {
        $image = new ImageService();
        $image = $image -> get($userId);

        // Если изображение найдено, возвращаем его данные
        return $image;
    }
}
