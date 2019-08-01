<?php

namespace App\Exports;

use App\Data;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class DataExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents
{
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function collection()
    {
        if (Auth::check()) {
            if (Auth::user()->role->Description != 'Admin') {
                $query1 = Data::withTrashed()
                            ->with('user', 'cluster', 'district', 'mlgu', 'barangay', 'bloodType')
                            ->whereIn('Data_ID', $this->data)
                            ->where('User_ID', Auth::user()->id)
                            ->get();
                $query2 = Data::withTrashed()
                            ->with('user', 'cluster', 'district', 'mlgu', 'barangay', 'bloodType')
                            ->where('Data_ID', $this->data)
                            ->where('User_ID', Auth::user()->id)
                            ->get();
            } else {
                $query1 = Data::withTrashed()
                            ->with('user', 'cluster', 'district', 'mlgu', 'barangay', 'bloodType')
                            ->whereIn('Data_ID', $this->data)
                            ->get();
                $query2 = Data::withTrashed()
                            ->with('user', 'cluster', 'district', 'mlgu', 'barangay', 'bloodType')
                            ->where('Data_ID', $this->data)
                            ->get();
            }
        }

        return (sizeof($this->data) > 1) ? $query1 : $query2;
    }

    public function headings(): array
    {
        return [
            'User ID',
            'Data ID',
            'Cluster',
            'District',
            'mLGU',
            'Barangay',
            'Last Name',
            'First Name',
            'M.I.',
            'Birthdate',
            'Gender',
            'Weight',
            'Height',
            'Blood Type',
            'Contact No.',
            'House',
            'Street', 
            'Sitio',
            'Purok',
            'Barangay',
            'Created At',
            'Updated At'
        ];
    }

    public function map($data): array
    {
        return [
            $data->User_ID,
            $data->Data_ID,
            $data->cluster->Description,
            $data->district->Description,
            $data->mlgu->Description,
            $data->barangay->Description,
            $data->LName,
            $data->FName,
            $data->MI,
            $data->Birthdate,
            $data->Gender ? 'M' : 'F',
            $data->Weight_kg,
            $data->Height_cm,
            $data->bloodtype->Description,
            $data->Contact_No,
            $data->House_No,
            $data->Street_Name,
            $data->Sitio,
            $data->Purok,
            $data->Barangay,
            $data->created_at,
            $data->updated_at
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:V1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
