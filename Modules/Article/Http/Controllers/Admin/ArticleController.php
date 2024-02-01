<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Illuminate\Http\Request;
use Modules\Article\Http\Requests\ArticleStoreRequest;
use Modules\Article\Repositories\ArticleRepository as Repository;

class ArticleController extends BaseManageController
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-book-medical"></i> จัดการบทความ',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลจัดการบทความได้',
                ],
            ],
            'permission_prefix' => 'article'
        ]);
    }

    public function index()
    {
        $data['lists'] = $this->repository->paginate();

        return $this->render('article::admin.index', $data);
    }

    public function search(Request $request)
    {
        $data['lists'] = $this->repository->search($request->all());

        return $this->render('article::admin.index', $data);
    }

    public function create()
    {
        return $this->render('article::admin.create');
    }

    public function store(ArticleStoreRequest $request)
    {
        $this->repository->create($this->requestSlugGenerate($request->all(), 'title'));

        return $this->repository->redirectToList();
    }

    public function edit($id)
    {
        $data['result'] = $this->repository->get($id);

        return $this->render('article::admin.edit', $data);
    }

    public function update(ArticleStoreRequest $request, $id)
    {
        $this->repository->update($this->requestSlugGenerate($request->all(), 'title'), $id);

        return $this->repository->redirectToList();
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);

        return $this->repository->redirectToList();
    }

    public function sort(Request $request)
    {
        $this->repository->sort($request->all());

        return response()->json(['success' => 'updated successfully.']);
    }
}
