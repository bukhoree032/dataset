<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Route;
use Storage;
use ItopCyberUpload;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Auth;

class BaseDifferentRepository extends BaseRepository
{
    protected $classModelName;

    /**
     * @param array $config
     */
    public function init(array $config = [])
    {
        if (isset($config['class_model_name'])) {
            $this->classModelName = $config['class_model_name'];
        } else {
            throw new HttpException(500, 'please check parameters configs.');
        }
    }

    /**
     * @return mixed
     */
    static function __auth()
    {
        return Auth::guard('member')->user();
    }

    /**
     * @return array|null[]
     */
    static function __member()
    {
        $result = [
            'member_id' => null
        ];

        if (Auth::guard('member')->check()) {
            $result = [
                'member_id' => self::__auth()->id
            ];
        }

        return $result;
    }

    /**
     * @return mixed
     */
    static function __check()
    {
        return Auth::guard('member')->check();
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
     * @param array $sort
     * @param int $limit
     * @return mixed
     */
    public function paginate($sort = [], $limit = 20)
    {
        $q = $this->classModelName::query();

        if (self::__check() === false) {
            $q->whereNull('member_id');
        } else {
            $q->where("member_id", self::__auth()->id);
        }

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
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        if (isset($request['password'])) {
            $request['password'] = \Hash::make($request['password']);
        }

        $result = $this->classModelName::create($request + self::__member());
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
     * @param array $request
     * @return mixed
     */
    public function sort($request = [])
    {
        $output = [];
        parse_str($request['serialize'], $output);

        if (self::__check() === false) {
            $j = 0;
            foreach ($output['item'] as $index => $value) {
                $j = $index + 1;
                $this->classModelName::whereNull('member_id')
                    ->where('id', $value)
                    ->update(['sort' => $j]);
            }

            $q = $this->classModelName::query();
            $model = $q->whereNull('member_id')
                ->whereNotIn('id', $output['item'])
                ->select(['id'])
                ->get()
                ->toArray();

            foreach ($model as $index => $value) {
                $j += 1;
                $this->classModelName::whereNull('member_id')
                    ->where('id', $value['id'])
                    ->update(['sort' => $j]);
            }

            return $model;
        } else {
            $j = 0;
            foreach ($output['item'] as $index => $value) {
                $j = $index + 1;
                $this->classModelName::where("member_id", self::__auth()->id)
                    ->where('id', $value)
                    ->update(['sort' => $j]);
            }

            $q = $this->classModelName::query();
            $model = $q->where("member_id", self::__auth()->id)
                ->whereNotIn('id', $output['item'])
                ->select(['id'])
                ->get()
                ->toArray();

            foreach ($model as $index => $value) {
                $j += 1;
                $this->classModelName::where("member_id", self::__auth()->id)
                    ->where('id', $value['id'])
                    ->update(['sort' => $j]);
            }
        }

        return $model;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToList()
    {
        if (self::__check() === false) {
            return redirect()->route('admin.'.strtolower(self::__module()).'.index');
        } else {
            return redirect()->route('segment_site.admin.'.strtolower(self::__module()).'.index', self::__auth()->username);
        }

    }
}
