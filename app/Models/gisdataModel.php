<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gisdataModel extends Model
{
    protected $table = 'SK_144_MENHUT_II_2014';
    protected $guarded = ['id'];

    public function geojson_api()
    {
        return $this
        ->selectRaw('id, st_asgeojson(geom) as geom, "NKWS", "NOSKTAP"')
        ->get();
    }

}
