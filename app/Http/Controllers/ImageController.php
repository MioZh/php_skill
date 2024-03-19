<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request, $id)
    {
        // Проверяем, был ли передан файл
        if ($request->hasFile('image')) {
            // Получаем файл из запроса
            $image = $request->file('image');
            
            // Генерируем уникальное имя для изображения
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Сохраняем изображение в директории
            $image->move('front/images_profil', $imageName);
            
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
            

            return response()->json(['message' => 'Изображение успешно сохранено'], 200);
        } else {
            return response()->json(['message' => 'Файл изображения не был передан'], 400);
        }
    }

    public function getUserImage($userId)
    {
        // Пытаемся найти изображение для данного пользователя
        $image = Image::where('user_id', $userId)->first();

        // Если изображение не найдено, возвращаем сообщение об ошибке
        if (!$image) {
            return response()->json(['image_path' => 'Изображение пользователя не найдено'], 404);
        }

        // Если изображение найдено, возвращаем его данные
        return response()->json(['image_path' => $image->image_path]);
    }

    public function create($userId, $imagePath)
    {
        $image = Image::create([
            'image_path' => $imagePath,
            'user_id' => $userId,
        ]);
        return $image;
    }
}
