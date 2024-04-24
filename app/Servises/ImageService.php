<?php

namespace App\Servises;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function get($userId){
        $image = Image::where('user_id', $userId)->first();
        if (!$image) {
            $res = response()->json(['image_path' => 'Изображение пользователя не найдено'], 404);
        }
        $res = response()->json(['image_path' => $image->image_path]);
        return $res;
    }

    public function stor($request, $id){
        // Получаем файл из запроса
        $image = $request->file('image');
            
        // Генерируем уникальное имя для изображения
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        
        // Сохраняем изображение в директории
        $image->store('front/images_profil', 'public');
        
        // Сохраняем путь к изображению в базе данных
        $imagePath = 'images_profil/' . $imageName;

        
        $userImage = Image::where('user_id', $id)->first();
        // Обновляем путь к изображению в базе данных для определенного пользователя
        if ($userImage) {
            // Проверяем, если image_path не null, удаляем старое изображение с диска
            if ($userImage->image_path) {
                Storage::delete($userImage->image_path);
            } else {
                // Если image_path равно null, присваиваем ссылку на стандартное изображение
                $userImage->image_path = "pict/default_image.jpg";
            }
        
            // Обновляем путь к изображению
            $userImage->image_path = $imagePath;
            $userImage->save();
        }
    }
}