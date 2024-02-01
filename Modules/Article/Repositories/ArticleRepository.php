<?php

namespace Modules\Article\Repositories;

use App\Repositories\BaseRepository;
use Modules\Article\Entities\Article;

class ArticleRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => Article::class
        ]);
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
     * @param array $condition
     * @return mixed
     */
    public function search($condition = [])
    {
        $q = $this->classModelName::query();
        if ((isset($condition['from']) && isset($condition['to'])) && ($condition['from'] != "" && $condition['to'] != "")) {
            $q->whereBetween('date', [$condition['from'], $condition['to']]);

        }

        if (isset($condition['from']) && $condition['author'] != "") {
            $q->where('author', 'LIKE', "%" . $condition['author'] . "%");
        }

        $q->orderBy('id', 'DESC');

        return $q->paginate(20)
            ->appends($condition);
    }

}