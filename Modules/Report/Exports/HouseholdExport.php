<?php
namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HouseholdExport implements FromView, ShouldAutoSize, WithTitle, WithEvents
{
    use Exportable;

    private $count;
    private $colbStart;
    private $colbEnd;

    public function __construct()
    {
        $this->colbStart = "A";
        $this->colbEnd = "R";
    }

    public function view(): View
    {
        $data = \DB::table('household_infos')
            ->select([
                'stores.STORE_FORM_NUMBER',
                'provinces.name_th as name_th_jangwat',
                'amphures.name_th as name_th_am',
                'districts.name_th as name_th_dis',
                'household_infos.HOUSEHOLD_INFO_MOO',
                'household_infos.HOUSEHOLD_INFO_VIL_NAME',
                'household_infos.HOUSEHOLD_INFO_COMMU_NAME',
                'household_infos.HOUSEHOLD_INFO_ADDRESS',
                'household_infos.HOUSEHOLD_INFO_HOUSE_CODE',
                'household_infos.HOUSEHOLD_INFO_CITIZENNUMBER',
                'household_infos.HOUSEHOLD_INFO_HOUSE_NEAR',
                'household_infos.HOUSEHOLD_INFO_SOI',
                'household_infos.HOUSEHOLD_INFO_ROAD',
                'household_infos.HOUSEHOLD_INFO_LOCAL_LAT',
                'household_infos.HOUSEHOLD_INFO_LOCAL_LONG',
                'household_infos.HOUSEHOLD_INFO_VIL_NAME',
                'household_infos.HOUSEHOLD_INFO_COMMU_NAME'
            ])
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('provinces', 'provinces.id', '=', 'household_infos.HOUSEHOLD_INFO_PROVINCE')
            ->join('districts', 'districts.id', '=', 'household_infos.HOUSEHOLD_INFO_DISTRICT')
            ->join('amphures', 'amphures.id', '=', 'household_infos.HOUSEHOLD_INFO_AMPHURE')
            ->get();

        // dd($data);
        $this->count = count($data);

        return view('report::admin.report.export.household', compact('data'));
    }

    public function title(): string
    {
        return "Sheet1";
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);

                $styleConfig = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFF0000']
                        ],
                        'vertical' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFF0000']
                        ]
                    ]
                ];

                $event->sheet->getStyle("{$this->colbStart}1:{$this->colbEnd}1")->applyFromArray($styleConfig);

                for ($i = 1; $i <= $this->count; $i++) {
                    $event->sheet->getStyle("{$this->colbStart}1:{$this->colbEnd}" . ($i + 1))->applyFromArray($styleConfig);
                }
            }
        ];
    }
}
