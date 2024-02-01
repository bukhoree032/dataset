<?php

namespace Modules\Member\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Hash, DB, Cache, Auth, Storage;

use Modules\Member\Http\Requests\MemberStoreRequest;
use Modules\Member\Repositories\MemberRepository  as Repository;

class MemberController extends BaseManageController
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-database"></i> จัดการสมาชิก',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้',
                ],
            ],
            'breadcrumb' => [
                'class_name' => 'AdminMemberBreadcrumb'
            ],
            'permission_prefix' => 'member'
        ]);
    }

    public function index(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?".http_build_query($request->all())."&export=pdf";
        } else {
            $query_string = "?export=pdf";
        }

        if ($request->has('date') || $request->has('code')) {
            $data['lists'] = $this->repository->search([
                'date' => $request->input('date'),
                'code' => $request->input('code'),
            ]);
        } else {
            $data['lists'] = $this->repository->paginate();
            $data['listHouseholdAll'] = $this->repository->listHouseholdAll();
        }
        $data['query_string'] = $query_string;

        return $this->render('member::admin.index', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $data['provinces'] = $this->getProvinces();

        return $this->render('member::admin.create', $data);
    }

    /**
     * @param  MemberStoreRequest  $request
     * @return mixed
     */
    public function store(MemberStoreRequest $request)
    {
        $this->repository->create($request->all());

        return $this->repository->redirectToList();
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['result'] = $this->repository->get($id);
        $data['provinces'] = $this->getProvinces();

        return $this->render('member::admin.edit', $data);
    }

    public function update(MemberStoreRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);

        return $this->repository->redirectToList();
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return $this->repository->redirectToList();
    }

    private function storageDelete($file)
    {
        Storage::delete("public/member/$file");
        Storage::delete("public/member/crop/$file");
    }

    private function exportPDF($start, $end)
    {
        try {
            $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
            $fontDirs = $defaultConfig['fontDir'];

            $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
            $fontData = $defaultFontConfig['fontdata'];

            $data['members'] = $this->getMember($start, $end, "pdf");
            $html = \View::make('member::admin.report.pdf', $data);
            $html = $html->render();

            $mpdf = new \Mpdf\Mpdf([
                'format' => 'A4-L',
                'fontDir' => array_merge($fontDirs, [
                    public_path('assets/PdfFonts')
                ]),
                'fontdata' => $fontData + [
                        "angsana" => [
                            'R' => "angsau.ttf",
                            'B' => "angsaub.ttf",
                            'useOTL' => 0xFF,
                            'useKashida' => 75
                        ]
                    ],
                'default_font' => 'garuda',
                'default_font_size' => 9,
                'tempDir' => '/tmp',
                // 'margin_left'   => 10,
                // 'margin_right'  => 10,
                // 'margin_bottom' => 20,
                'margin_top' => 18,
                'margin_header' => 10,
                'margin_footer' => 10
            ]);

            $mpdf->SetHeader([
                'odd' => [
                    'L' => [
                        'content' => "HALASPATHAILAND.COM",
                        'font-size' => 9,
                        'font-style' => 'B',
                        'color' => '#000000'
                    ],
                    'line' => 1
                ],
                'even' => []
            ]);

            $mpdf->SetFooter([
                'odd' => [
                    'L' => [
                        'content' => (request()->has('from') && request()->has('to')) ? 'รายงานข้อมูลลูกค้าระหว่างวันที่ '.date("d/m/Y",
                                strtotime(request()->input('from')))." - ".date("d/m/Y",
                                strtotime(request()->input('to'))) : 'ทั้งหมด',
                        'font-size' => 9,
                        'font-style' => 'B',
                        'color' => '#000000'
                    ],
                    'R' => [
                        'content' => 'Page.{PAGENO}',
                        'font-size' => 9,
                        'font-style' => 'B',
                        'color' => '#000000'
                    ],
                    'line' => 1
                ],
                'even' => []
            ]);
            $stylesheet = file_get_contents('./assets/@site_control/css/mpdf.css');
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML($html, 2);
            $mpdf->SetTitle('report_member_'.time());
            $mpdf->Output('report_member_'.time().'.pdf', 'D');
        } catch (\Mpdf\MpdfException $e) {
            echo $e->getMessage();
        }
    }
}
