<?php

namespace Modules\Member\Repositories;

use App\CustomClass\ItopCyberUpload;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\Member\Entities\Member;

class MemberRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => Member::class
        ]);
    }

    public function ctlUploadOption()
    {
        return [
            'crop' => [
                'width' => 160,
                'height' => 160,
            ],
        ];
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function get1()
    {
        return $this->classModelName::get();
    }
    			

    /**
     * @param array $sort
     * @param $info_id
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listMember()
    {
        $result = \DB::table('household_members')
            ->select([
                'household_info_id',
                'id',
            ])
            ->get();
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
     * @param $info_id
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listHouseholdAll()
    {
        $data['members'] = \DB::table('members')
                ->select([
                    'id',
                    'pay',
                ])
            ->get();
        $data['stores'] = \DB::table('stores')
            ->select([
                'id',
            ])
            ->count();
        return $data;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        if(isset($request['password'])){
            $request['password'] =  Hash::make($request['password']);
        }

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
        $result->update($request);
        if ($result) {
            if (isset($request['cover'])) {
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
        $folder = strtolower(end($exp)) . '/' . gen_folder($id);

        Storage::disk('public')->delete("$folder/$file_name");
        Storage::disk('public')->delete("$folder/crop/$file_name");
        Storage::disk('public')->delete("$folder/thumbnail/$file_name");
        Storage::disk('public')->delete("$folder/resize/$file_name");
    }

    public function redirectToList()
    {
        return redirect()->route('admin.member.index');
    }
}