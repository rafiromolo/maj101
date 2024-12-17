<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController 
{
    public function getTable1()
    {
        $data = [
            ["po" => "1234567890", "gr" => "9876543210", "invoice" => "1010011010", "faktur" => "1010111100"],
            ["po" => "1234567891", "gr" => "9876543211", "invoice" => "1010011011", "faktur" => "1010111101"],
            ["po" => "1234567892", "gr" => null, "invoice" => "1010011012", "faktur" => "1010111102"],
            ["po" => "1234567893", "gr" => "9876543213", "invoice" => "1010011013", "faktur" => "1010111103"],
            ["po" => "1234567893", "gr" => "9876543214", "invoice" => "1010011014", "faktur" => "1010111104"],
            ["po" => "1234567893", "gr" => "9876543215", "invoice" => "1010011015", "faktur" => "1010111105"],
            ["po" => "1234567894", "gr" => "9876543216", "invoice" => "1010011016", "faktur" => "1010111106"],
            ["po" => "1234567895", "gr" => "9876543217", "invoice" => "1010011017", "faktur" => "1010111107"],
            ["po" => "1234567896", "gr" => "9876543218", "invoice" => "1010011018", "faktur" => null],
            ["po" => "1234567897", "gr" => "9876543219", "invoice" => "1010011019", "faktur" => null],
            ["po" => "1234567898", "gr" => "9876543220", "invoice" => "1010011020", "faktur" => null],
            ["po" => "1234567899", "gr" => "9876543221", "invoice" => null, "faktur" => null],
            ["po" => "1234567900", "gr" => "9876543222", "invoice" => null, "faktur" => null],
            ["po" => "1234567901", "gr" => "9876543223", "invoice" => null, "faktur" => null],
            ["po" => "1234567902", "gr" => "9876543224", "invoice" => null, "faktur" => null],
            ["po" => "1234567903", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567904", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567905", "gr" => null, "invoice" => null, "faktur" => null],
        ];

        $data = array_map(function ($row) {
            return array_map(function ($value) {
                return $value === null ? '-' : $value;
            }, $row);
        }, $data);

        return $this->response->setJSON($data);
    }

    public function getTable2()
    {
        $data = [
            ["po" => "1234567890", "gr" => "9876543210", "invoice" => "1010011010", "faktur" => "1010111100"],
            ["po" => "1234567891", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567892", "gr" => "9876543212", "invoice" => "1010011012", "faktur" => "1010111102"],
            ["po" => "1234567893", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567894", "gr" => "9876543214", "invoice" => "1010011014", "faktur" => "1010111104"],
            ["po" => "1234567895", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567896", "gr" => "9876543216", "invoice" => "1010011016", "faktur" => "1010111106"],
            ["po" => "1234567897", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567898", "gr" => "9876543218", "invoice" => "1010011018", "faktur" => null],
            ["po" => "1234567899", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567900", "gr" => "9876543220", "invoice" => "1010011020", "faktur" => null],
            ["po" => "1234567901", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567902", "gr" => "9876543222", "invoice" => null, "faktur" => null],
            ["po" => "1234567903", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567904", "gr" => "9876543224", "invoice" => null, "faktur" => null],
            ["po" => "1234567905", "gr" => null, "invoice" => null, "faktur" => null],
            ["po" => "1234567906", "gr" => "9876543226", "invoice" => null, "faktur" => null],
            ["po" => "1234567907", "gr" => null, "invoice" => null, "faktur" => null],
        ];

        $data = array_map(function ($row) {
            return array_map(function ($value) {
                return $value === null ? '-' : $value;
            }, $row);
        }, $data);

        return $this->response->setJSON($data);
    }
}

?>