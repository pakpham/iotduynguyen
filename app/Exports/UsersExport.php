<?php
  
namespace App\Exports;
  
use App\DataSensor;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	
        return DataSensor::all();
    }
}