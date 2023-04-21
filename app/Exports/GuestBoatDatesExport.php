<?php

namespace App\Exports;

use App\Models\GuestBoatDates;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class GuestBoatDatesExport extends ExcelExport implements WithMapping, WithColumnFormatting
{
    protected $view  = 'admin.guestBoatDates.export';
    protected $model = GuestBoatDates::class;
    protected $with = 'boat';
    protected $headings = [
        'Bootsname',
        'Länge',
        'Von',
        'Bis',
        'Tage',
        'Personen',
        'Strom',
        'Preis',
    ];

    public function map($row): array
    {
        return [
            $row->boat->name,
            $row->boat->length,
            $row->from->format('d.m.Y'),
            $row->until->format('d.m.Y'),
            $row->days,
            $row->persons,
            $row->electric ? 'ja' : 'nein',
            $row->price,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => DataType::TYPE_STRING,
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_NUMBER,
            'F' => NumberFormat::FORMAT_NUMBER,
            'G' => DataType::TYPE_STRING,
            'H' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}
