<?php

namespace App\Http\Controllers;

use App\Models\gisdataModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->gisdata = new gisdataModel();
    }

    public function geojson_SK_144_MENHUT_II_2014()
    {
        $polygon = $this->gisdata->geojson_api();

        $feature = array();

        foreach ($polygon as $data) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($data->geom),
                'properties' => [
                    'id' => $data->id,
                    'NKWS' => $data->NKWS,
                    'NOSKTP' => $data->NOSKTP,
                    
                ]
            ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ])->setEncodingOptions(JSON_NUMERIC_CHECK);
    }
}
