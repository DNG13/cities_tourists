<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name',  'country', 'links'];

    protected $casts = [
        'links' => 'array',
    ];

    public function tourist()
    {
        return $this->belongsToMany('App\Tourist');
    }

    public function delete()
    {
        if(!empty($this->links)) {
            foreach ($this->links as $link) {
                if(is_file(public_path("/uploads/" . $link))) {
                    unlink(public_path("/uploads/" . $link));
                }
            }
        }
        return parent::delete();
    }
}
