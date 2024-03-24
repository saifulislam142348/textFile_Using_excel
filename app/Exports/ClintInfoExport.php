<?php

namespace App\Exports;

use App\Models\ClintInfo;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClintInfoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ClintInfo::select("application_date","Expiration_date", "name", "relative_name","birth_day","phone","nid","passport","address","description")->get();
    }
    public function headings(): array
    {
        return ["Application_Date","Expiration_date","Name", "Relative_name","Birth_day","Phone","Nid","Passport","Address","description"];
    }
}
