<?php

namespace App\Exports;

use App\Models\VehicleOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehicleOrdersExport implements FromCollection, WithHeadings
{
    private $startDate;
    private $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return VehicleOrder::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->select('id', 'vehicle_id', 'user_id', 'status', 'created_at')
            ->get();
    }

    public function headings(): array
    {
        return ['Order ID', 'Vehicle ID', 'User ID', 'Status', 'Created At'];
    }
}
