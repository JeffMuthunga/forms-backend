<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Drug;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(): void {
        $data =  [
            [
                "referenceNo"=> "REF001",
                 "premisesName"=> "ABC Store",
                 "physicalAddress"=> "123 Main Street",
                 "regionName"=> "Nairobi",
                 "dateAdded"=> "2023-10-18",
                 "submissionDate"=> "2023-10-20",
                 "status"=> true
               ],
               [
                 "referenceNo"=> "REF002",
                 "premisesName"=> "XYZ Restaurant",
                 "physicalAddress"=> "456 Park Avenue",
                 "regionName"=> "Mombasa",
                 "dateAdded"=> "2023-10-18",
                 "submissionDate"=> "2023-10-21",
                 "status"=> false
               ],
               [
                 "referenceNo"=> "REF003",
                 "premisesName"=> "PQR Mall",
                 "physicalAddress"=> "789 Shopping Road",
                 "regionName"=> "Nairobi",
                 "dateAdded"=> "2023-10-19",
                 "submissionDate"=> "2023-10-22",
                 "status"=> true
               ],
               [
                 "referenceNo"=> "REF004",
                 "premisesName"=> "LMN Hotel",
                 "physicalAddress"=> "101 Resort Boulevard",
                 "regionName"=> "Nairobi",
                 "dateAdded"=> "2023-10-19",
                 "submissionDate"=> "2023-10-23",
                 "status"=> false
               ],
               [
                 "referenceNo"=> "REF005",
                 "premisesName"=> "EFG Café",
                 "physicalAddress"=> "246 Coffee Lane",
                 "regionName"=> "Kisumu",
                 "dateAdded"=> "2023-10-20",
                 "submissionDate"=> "2023-10-24",
                 "status"=> true
               ],
               [
                 "referenceNo"=> "REF006",
                 "premisesName"=> "HIJ Pharmacy",
                 "physicalAddress"=> "369 Healthcare Drive",
                 "regionName"=> "Nairobi",
                 "dateAdded"=> "2023-10-20",
                 "submissionDate"=> "2023-10-25",
                 "status"=> false
               ],
               
               
               
           
        ];

          foreach($data as $item){
            Drug::create($item);
          }
          print("Seeding complete");
        }
    }
