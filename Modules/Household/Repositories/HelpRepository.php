<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\Help;
use Auth;

class HelpRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => Help::class
        ]);
    }

    public function ctlUploadOption()
    {
        return [
            'crop' => [
                'width' => 160,
                'height' => 160
            ]
        ];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $result = $this->classModelName::findOrFail($id);
        
        return $result;
    }

    /**
     * @param array $sort
     * @return mixed
     */
    public function list($sort = [])
    {
        $q = $this->classModelName::query();

        if(Auth::guard('member')->check()){
            $q->where('member_id', Auth::guard('member')->user()->id);
        }

        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        $result = $q->get();
        return collect($result)->map(function ($item) {
            if (!isset($item->url)) {
                $uri = $item->id;
                if (isset($item->slug)) {
                    $uri = $item->slug;
                }

                $item->url = url($this->uriPrefix . '/view/' . $uri);
            }

            return $item;
        });
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $result = $this->classModelName::create($request);

        return $result;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        if (!empty($request)) {
            foreach ($request as $key => $value) {
                if (is_array($value)) {
                    $request[$key] = serialize($value);
                }
            }
        }

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
     * @param mixed $id
     * @param mixed $file_name
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
     * @param $id
     *
     * @return mixed
     */
    public function historyOfMember($id)
    {
        $q = $this->classModelName::query();

        $q->where('HE_ID', $id);
        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        return $q->paginate(20);
    }

}
