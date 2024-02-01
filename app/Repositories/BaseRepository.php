<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Route;
use Storage;
use ItopCyberUpload;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseRepository
{
    protected $classModelName;
    protected $uriPrefix;

    /**
     * @param array $config
     */
    public function init(array $config = [])
    {
        if (isset($config['class_model_name'])) {
            $this->classModelName = $config['class_model_name'];

            if (isset($config['uri_prefix'])) {
                $this->uriPrefix = $config['uri_prefix'];
            }
        } else {
            throw new HttpException(500, 'please check parameters configs.');
        }
    }

    /**
     * @return string
     */
    static function __module()
    {
        $action = Route::getCurrentRoute()->getActionName();
        $exp = explode("\\", $action);

        return ucfirst($exp[1]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->classModelName::findOrFail($id);
    }

    /**
     * @param mixed $slug
     * @return void
     */
    public function getSlug($slug)
    {
        $result = $this->classModelName::where("slug", $slug)->firstOrFail();
        if (!isset($result->url)) {
            if (isset($result->slug)) {
                $result->id = $result->slug;
            }

            $result->url = url($this->uriPrefix . '/view/' . $result->id);
        }

        return $result;
    }

    /**
     * @param array $sort
     * @param int $limit
     * @return mixed
     */
    public function limit($sort = [], $limit = 20)
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        $result = $q->limit($limit)->get();
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
     * @param array $sort
     * @return mixed
     */
    public function list($sort = [])
    {
        $q = $this->classModelName::query();
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
     * @param array $sort
     * @param int $limit
     * @return mixed
     */
    public function paginate($sort = [], $limit = 20)
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }
        
        return $q->paginate($limit);
    }

    /**
     * @param array $sort
     * @param int $limit
     * @return mixed
     */
    public function paginate_show($sort = [], $limit = 20)
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->join('household_infos', 'stores.id', '=', 'household_infos.store_id');

            $q->join('provinces', 'household_infos.HOUSEHOLD_INFO_PROVINCE', '=', 'provinces.id');
            $q->join('amphures', 'household_infos.HOUSEHOLD_INFO_AMPHURE', '=', 'amphures.id');
            $q->join('districts', 'household_infos.HOUSEHOLD_INFO_DISTRICT', '=', 'districts.id');
            $q->select('stores.*', 'provinces.name_th as name_pro', 'amphures.name_th as name_am', 'districts.name_th as name_dis');
            $q->orderBy('stores.id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }
        $data['lists'] = $q->paginate($limit);
        $data['co'] = $q->count(); 
        return $data;
    }

    /**
     * @param array $sort
     * @param int $limit
     * @return mixed
     */
    public function paginate_search($request, $sort = [], $limit = 20)
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->join('household_infos', 'stores.id', '=', 'household_infos.store_id');

            $q->join('provinces', 'household_infos.HOUSEHOLD_INFO_PROVINCE', '=', 'provinces.id');
            $q->join('amphures', 'household_infos.HOUSEHOLD_INFO_AMPHURE', '=', 'amphures.id');
            $q->join('districts', 'household_infos.HOUSEHOLD_INFO_DISTRICT', '=', 'districts.id');
            $q->select('stores.*', 'provinces.name_th as name_pro', 'amphures.name_th as name_am', 'districts.name_th as name_dis');
            if($request->HOUSEHOLD_INFO_PROVINCE != '9998'){
                $q->where('household_infos.HOUSEHOLD_INFO_PROVINCE', $request->HOUSEHOLD_INFO_PROVINCE);
            }
            if($request->HOUSEHOLD_INFO_AMPHURE != '9998'){
                $q->where('household_infos.HOUSEHOLD_INFO_AMPHURE', $request->HOUSEHOLD_INFO_AMPHURE);
            }
            if($request->HOUSEHOLD_INFO_DISTRICT != '9998'){
                $q->where('household_infos.HOUSEHOLD_INFO_DISTRICT', $request->HOUSEHOLD_INFO_DISTRICT);
            }
            $q->orderBy('stores.id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }
        
        $data['lists'] = $q->paginate($limit);
        $data['co'] = $q->count(); 
        return $data;
    }

    /**
     * @param array $sort
     * @param int $limit
     * @return mixed
     */
    public function paginate_all($day = '2000-02-10 00:00:00', $today = '3000-02-10 23:59:59' ,$sort = [], $limit = 1000000)
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }
        $q->whereBetween('created_at', [$day, $today]);
        return $q->paginate($limit);
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function search($array = [])
    {
        $q = $this->classModelName::query();
        if ($array['code'] != "") {
            $q->where("code", $array['code']);
        }
        $q->orderBy('id', 'DESC');

        return $q->paginate(20);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        if (isset($request['password'])) {
            $request['password'] = \Hash::make($request['password']);
        }

        $result = $this->classModelName::create($request);
        if ($result) {
            if (isset($request['cover'])) {
                $this->classModelName::where('id', $result->id)->update([
                    'cover' => $this->ctlUpload($_FILES['cover'], $result->id)
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
                    'cover' => $this->ctlUpload($_FILES['cover'], $id)
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
     * @param array $request
     * @return mixed
     */
    public function sort($request = [])
    {
        $output = [];
        parse_str($request['serialize'], $output);

        $j = 0;
        foreach ($output['item'] as $index => $value) {
            $j = $index + 1;
            $this->classModelName::where('id', $value)
                ->update(['sort' => $j]);
        }

        $q = $this->classModelName::query();
        $model = $q->whereNotIn('id', $output['item'])
            ->select(['id'])
            ->get()
            ->toArray();

        foreach ($model as $index => $value) {
            $j += 1;
            $this->classModelName::where('id', $value['id'])
                ->update(['sort' => $j]);
        }

        return $model;
    }

    /**
     * @return array[]
     */
    public function ctlUploadOption()
    {
        return [
            'thumbnail' => [
                'width' => 640,
                'height' => 480,
                'watermark' => "watermark_01"
            ],
            'resize' => [
                'width' => 640,
                'height' => 480,
                'watermark' => "watermark_01"
            ],
            'crop' => [
                'width' => 640,
                'height' => 480,
                'watermark' => "watermark_01"
            ]
        ];
    }

    /**
     * @param $file
     * @param $id
     * @return mixed
     */
    public function ctlUpload($file, $id)
    {
        $exp = explode("\\", $this->classModelName);
        $sub_folder = gen_folder($id);
        $folder = strtolower(end($exp)) . '/' . $sub_folder;

        $options = $this->ctlUploadOption();

        return ItopCyberUpload::upload(storage_path('app/public/' . $folder), $file, $options);
    }

    /**
     * @param mixed $id
     * @param mixed $file_name
     * @return void
     */
    public function storageDelete($id, $file_name)
    {
        $exp = explode("\\", $this->classModelName);
        $folder = strtolower(end($exp)) . '/' . gen_folder($id);

        Storage::disk('public')->delete("$folder/$file_name");
        Storage::disk('public')->delete("$folder/crop/$file_name");
        Storage::disk('public')->delete("$folder/thumbnail/$file_name");
        Storage::disk('public')->delete("$folder/resize/$file_name");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToList()
    {
        return redirect()->route('admin.' . strtolower(self::__module()) . '.index');
    }

    /**
     * @param $array
     * @param array $excludeKeys
     * @return mixed
     */
    public function arrayExclude($array, array $excludeKeys)
    {
        foreach ($excludeKeys as $key) {
            unset($array[$key]);
        }
        return $array;
    }
}
