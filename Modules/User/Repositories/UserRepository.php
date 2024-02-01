<?php

namespace Modules\User\Repositories;

use Storage;
use Modules\User\Entities\User;
use App\CustomClass\ItopCyberUpload;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => User::class
        ]);
    }

    public function ctlUploadOption()
    {
        return [
            'crop' => [
                'width'  => 160,
                'height' => 160
            ]
        ];
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $result = $this->classModelName::create($request);
        if ($result) {
            if (isset($request['cover'])) {
                $this->classModelName::where('id', $result->id)->update([
                    'avatar' => $this->ctlUpload($_FILES['cover'], $result->id)
                ]);
            }
        }

        return $result;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $result = $this->classModelName::findOrFail($id);
        $cover = $result->cover;
        $result->update($request);
        if ($result) {
            if (isset($request['cover'])) {
                $this->storageDelete($id, $cover);
                
                $this->classModelName::where('id', $id)->update([
                    'avatar' => $this->ctlUpload($_FILES['cover'], $id)
                ]);
            }
        }

        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $result = $this->classModelName::findOrFail($id);

        return $result->delete();
    }

    /**
     * @param  mixed $id
     * @param  mixed $file_name
     * @return void
     */
    public function storageDelete($id, $file_name)
    {
        $exp = explode("\\", $this->classModelName);
        $folder = 'avatar/' . gen_folder($id);

        Storage::disk('public')->delete("$folder/$file_name");
        Storage::disk('public')->delete("$folder/crop/$file_name");
        Storage::disk('public')->delete("$folder/thumbnail/$file_name");
        Storage::disk('public')->delete("$folder/resize/$file_name");
    }

    /**
     * @param  mixed $file
     * @param  mixed $id
     * @return void
     */
    public function ctlUpload($file, $id)
    {
        $exp = explode("\\", $this->classModelName);
        $sub_folder = gen_folder($id);
        $folder = 'avatar/' . $sub_folder;

        $options = $this->ctlUploadOption();

        return ItopCyberUpload::upload(storage_path('app/public/' . $folder), $file, $options);
    }
}
