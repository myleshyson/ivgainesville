<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class UserPhoto extends Model
{	
	protected $table = 'user_photos';
    protected $fillable = [
    'path'
    ];

    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    public function delete()
    {
        File::delete([
            $this->path
        ]);

        parent::delete();
    }
}
