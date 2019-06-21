<?php

namespace App\Exports;

use App\User;
use App\role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExportSearch implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents
{    
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }
    
    public function collection()
    {
        return (sizeof($this->users) > 1) ? User::withTrashed()->with('role')->whereIn('id', $this->users)->get() : User::withTrashed()->with('role')->where('id', $this->users)->get();
    }

    public function headings(): array
    {
        return [
            'User ID',
            'Role',
            'Username',
            'Email',
            'Created At',
            'Updated At'
        ];
    }

    public function map($users): array
    {
        return [
            $users->id,
            $users->role->Description,
            $users->username,
            $users->email,
            $users->created_at,
            $users->updated_at
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
