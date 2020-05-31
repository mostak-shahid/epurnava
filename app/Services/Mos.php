<?php
/**
 * Created by PhpStorm.
 * User: Md. Mostak Shahid
 * Date: 5/29/2020
 * Time: 11:21 PM
 */

namespace App\Services;

use Illuminate\Http\Request;

use Auth;
use App\Media;

class Mos
{
    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public static function slug($title, $id = 0, $modal='App\Post')
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        // $allSlugs = $this->getRelatedSlugs($slug, $id);
        $allSlugs = $modal::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    public static function mediastore(Request $request, $field){

        $media = $request->$field;

        $mimeType = $request->file($field)->getMimeType();
        // $extension = $request->file($field)->extension();
        // $extension = $request->file($field)->getClientOriginalExtension();;

        $file = $media->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        // $slug = str_slug($filename);
        $slug = self::slug($filename, 0, 'App\Media');
        $media_new_name = time().rand(1000,9999).$slug.'.'.$extension;
        $media->move('uploads',$media_new_name);

        $media_upload = Media::create([
            'user_id' => Auth::id(),
            'title' => $filename,
            'slug' => $slug,
            'url' => 'uploads/'.$media_new_name,
            'type' => $mimeType,
        ]);
        return $media_upload;
    }

}