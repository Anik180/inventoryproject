<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name', 'category_id', 'supplier_id','product_code','product_warehouse','product_route','product_image','buy_date','expire_date','buying_price','selling_price')->get();
    }

  
}
