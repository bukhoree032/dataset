<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Step32Export implements FromView, ShouldAutoSize, WithTitle, WithEvents
{
    use Exportable;

    private $count;
    private $colbStart;
    private $colbEnd;

    public function __construct()
    {
        $this->colbStart = "A";
        $this->colbEnd = "G";
    }

    public function view(): View
    {
        $data = \DB::table('household_infos')
            ->select([
                'stores.STORE_FORM_NUMBER',
                'household_econs.HOUSEHOLD_ECON_HOUSE_LIST',
                'household_econs.HOUSEHOLD_ECON_HOUSE_NO',
                'household_econs.HOUSEHOLD_ECON_LAND',
                'household_econs.HOUSEHOLD_ECON_LAND_SIZE',
                'household_econs.HOUSEHOLD_ECON_AREA_LIST',
                'household_econs.HOUSEHOLD_ECON_AREA_NO',
                'household_econs.HOUSEHOLD_ECON_EQUIPMENT_TYPE',
                'household_econs.HOUSEHOLD_ECON_EQUIPMENT_NUM',
                'household_econs.HOUSEHOLD_ECON_VEHICLE_NUM',
                'household_econs.HOUSEHOLD_ECON_VEHICLE_TYPE',
                'household_econs.HOUSEHOLD_ECON_COM_DEVICE_TYPE',
                'household_econs.HOUSEHOLD_ECON_COM_DEVICE_NUM',
                'household_econs.HOUSEHOLD_ECON_PET_CATEG',
                'household_econs.HOUSEHOLD_ECON_PET_NUM'
            ])
            ->join('stores', 'stores.id', '=', 'household_infos.store_id')
            ->join('household_econs', 'household_econs.household_info_id', '=', 'household_infos.id')
            ->get();

        function value_loop($str)
        {
            $sum_value_loop = '';
            $row = '0';
            foreach ($str as $key_loop => $value_loop) {
                if ($value_loop != '') {
                    $row++;
                    if ($row == '1') {
                        $sum_value_loop = $value_loop;
                    } else {
                        $sum_value_loop = $sum_value_loop . "," . $value_loop;
                    }
                }
            }

            return ($sum_value_loop);
        }
        function key_loop($str)
        {
            $sum_key_loop = '';
            $row = '0';
            foreach ($str as $key_loop => $value_loop) {
                if ($value_loop != '') {
                    $key_loop++;
                    $row++;
                    if ($row == '1') {
                        $sum_key_loop = $key_loop;
                    } else {
                        $sum_key_loop = $sum_key_loop . "," . $key_loop;
                    }
                }
            }

            return ($sum_key_loop);
        }

        foreach ($data as $key => $value) {
            $data[$key]->HOUSEHOLD_ECON_HOUSE_LIST = unserialize($data[$key]->HOUSEHOLD_ECON_HOUSE_LIST);
            $data[$key]->HOUSEHOLD_ECON_HOUSE_NO = unserialize($data[$key]->HOUSEHOLD_ECON_HOUSE_NO);
            $data[$key]->HOUSEHOLD_ECON_LAND = unserialize($data[$key]->HOUSEHOLD_ECON_LAND);
            $data[$key]->HOUSEHOLD_ECON_LAND_SIZE = unserialize($data[$key]->HOUSEHOLD_ECON_LAND_SIZE);
            $data[$key]->HOUSEHOLD_ECON_AREA_LIST = unserialize($data[$key]->HOUSEHOLD_ECON_AREA_LIST);
            $data[$key]->HOUSEHOLD_ECON_AREA_NO = unserialize($data[$key]->HOUSEHOLD_ECON_AREA_NO);
            $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_TYPE = unserialize($data[$key]->HOUSEHOLD_ECON_EQUIPMENT_TYPE);
            $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_NUM = unserialize($data[$key]->HOUSEHOLD_ECON_EQUIPMENT_NUM);
            $data[$key]->HOUSEHOLD_ECON_VEHICLE_NUM = unserialize($data[$key]->HOUSEHOLD_ECON_VEHICLE_NUM);
            $data[$key]->HOUSEHOLD_ECON_VEHICLE_TYPE = unserialize($data[$key]->HOUSEHOLD_ECON_VEHICLE_TYPE);
            $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_TYPE = unserialize($data[$key]->HOUSEHOLD_ECON_COM_DEVICE_TYPE);
            $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_NUM = unserialize($data[$key]->HOUSEHOLD_ECON_COM_DEVICE_NUM);
            $data[$key]->HOUSEHOLD_ECON_PET_CATEG = unserialize($data[$key]->HOUSEHOLD_ECON_PET_CATEG);
            $data[$key]->HOUSEHOLD_ECON_PET_NUM = unserialize($data[$key]->HOUSEHOLD_ECON_PET_NUM);

            $data[$key]->HOUSEHOLD_ECON_AREA_LIST = implode(", ", $data[$key]->HOUSEHOLD_ECON_AREA_LIST);
            $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_TYPE = implode(", ", $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_TYPE);
            $data[$key]->HOUSEHOLD_ECON_VEHICLE_TYPE = implode(", ", $data[$key]->HOUSEHOLD_ECON_VEHICLE_TYPE);
            $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_TYPE = implode(", ", $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_TYPE);
            $data[$key]->HOUSEHOLD_ECON_PET_CATEG = implode(", ", $data[$key]->HOUSEHOLD_ECON_PET_CATEG);

            $sum_loop = '';
            if ($data[$key]->HOUSEHOLD_ECON_AREA_NO[0][0] != '') {
                $sum_loop = $data[$key]->HOUSEHOLD_ECON_AREA_NO[0][0];
            }
            if ($data[$key]->HOUSEHOLD_ECON_AREA_NO[1][1] != '') {
                if ($sum_loop == '') {
                    $sum_loop = $data[$key]->HOUSEHOLD_ECON_AREA_NO[1][1];
                } else {
                    $sum_loop = $sum_loop . "," . $data[$key]->HOUSEHOLD_ECON_AREA_NO[1][1];
                }
            }
            if ($data[$key]->HOUSEHOLD_ECON_AREA_NO[1][2] != '') {
                if ($sum_loop == '') {
                    $sum_loop = $data[$key]->HOUSEHOLD_ECON_AREA_NO[1][2];
                } else {
                    $sum_loop = $sum_loop . "," . $data[$key]->HOUSEHOLD_ECON_AREA_NO[1][2];
                }
            }
            $data[$key]->HOUSEHOLD_ECON_AREA_NO = $sum_loop;

            $data[$key]->HOUSEHOLD_ECON_HOUSE_LIST = key_loop($data[$key]->HOUSEHOLD_ECON_HOUSE_LIST);
            $data[$key]->HOUSEHOLD_ECON_HOUSE_NO = value_loop($data[$key]->HOUSEHOLD_ECON_HOUSE_NO);
            $data[$key]->HOUSEHOLD_ECON_LAND = value_loop($data[$key]->HOUSEHOLD_ECON_LAND);
            $data[$key]->HOUSEHOLD_ECON_LAND_SIZE = value_loop($data[$key]->HOUSEHOLD_ECON_LAND_SIZE);
            $data[$key]->HOUSEHOLD_ECON_EQUIPMENT_NUM = value_loop($data[$key]->HOUSEHOLD_ECON_EQUIPMENT_NUM);
            $data[$key]->HOUSEHOLD_ECON_VEHICLE_NUM = value_loop($data[$key]->HOUSEHOLD_ECON_VEHICLE_NUM);
            $data[$key]->HOUSEHOLD_ECON_COM_DEVICE_NUM = value_loop($data[$key]->HOUSEHOLD_ECON_COM_DEVICE_NUM);
            $data[$key]->HOUSEHOLD_ECON_PET_NUM = value_loop($data[$key]->HOUSEHOLD_ECON_PET_NUM);
        }
        // dd($data);
        $this->count = count($data);

        return view('report::admin.report.export', compact('data'));
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
