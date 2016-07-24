<?php

namespace App;

use App\User;
use App\SmallGroup;
use Illuminate\Database\Eloquent\Model;

class SmallGroup extends Model
{	

	/**
	 * Mass Assignable Fields
	 * @var array
	 */
    protected $fillable = [
				'name',
				'description',
				'cell',
				'email',
				'leader',
				'meeting_time',
				'meeting_location'
			];
	/**
	 * Use smallgroups Table
	 * @var string
	 */
	protected $table = 'smallgroups';
}
