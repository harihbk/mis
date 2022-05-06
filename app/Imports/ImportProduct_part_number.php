<?php

namespace App\Imports;

use App\Models\Product_part_number;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProduct_part_number implements ToModel ,WithHeadingRow
{
    //private $rows = 1;

    /**
     *
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 1;
    }



    public function model(array $row)
    {


        $rowprod = $row['partnumber'];


        return Product_part_number::updateOrCreate(
            [
               'part_number'   => $rowprod,
            ],
            [
                'part_number'=>$row['partnumber'],
                'nominal_thread_m'=>$row['nominal_thread_m'],
                'product_length'=>$row['product_length'],
                'basic_shape'=>$row['basic_shop'],
                'additional_shape'=>$row['additional_shape'],
                'manufacturer'=>$row['manufacturer'],
                'original_price'=>$row['sales_price'],
                'dash_price'=>$row['weight_price'],
                "quantity" => $row['quantity'],
                "product_id"=>$row['product'],
            ],
        );

        // return new Product_part_number([
        // 'part_number'=>$row['partnumber'],
        // 'nominal_thread_m'=>$row['nominal_thread_m'],
        // 'product_length'=>$row['product_length'],
        // 'basic_shape'=>$row['basic_shop'],
        // 'additional_shape'=>$row['additional_shape'],
        // 'manufacturer'=>$row['manufacturer'],
        // 'original_price'=>$row['sales_price'],
        // 'dash_price'=>$row['weight_price'],
        // "quantity" => $row['quantity'],
        // "product_id"=>$row['product'],
        // ]);
    }
}
