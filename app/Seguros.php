<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguros extends Model
{
    protected $fillable= ['usuarios_id','num_seg','enf_seg','cual_enf_seg','tipo_seg','dis_seg',
    'cual_dis_seg','nom_seg','pri_seg','seg_seg','par_seg','email_seg','tel_seg','mov_seg'];

        public function usuario()
        {
            return $this->belongsTo('App\Usuarios');
        }
}
