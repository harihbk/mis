<?php

namespace App\Exports;

use App\Models\Product_part_number;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductPartnoExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        $columns = [
            'partnumber',
            'nominal thread m',
            'product length',
            'basic shop',
            'additional shape',
            'manufacturer',
            'sales price',
            'weight price',
            'quantity',
            'product'
        ];
        return $columns;
    }


    public function collection()
    {
        return Product_part_number::all('part_number', 'nominal_thread_m','product_length','basic_shape','additional_shape','manufacturer','original_price','dash_price','quantity','product_id');
    }
}
