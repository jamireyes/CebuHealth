<?php

namespace App\Exports;

use App\User;
use App\role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents
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
            'First Name',
            'M.I.',
            'Last Name',
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
            $users->first_name,
            $users->middle_init,
            $users->last_name,
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
                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
