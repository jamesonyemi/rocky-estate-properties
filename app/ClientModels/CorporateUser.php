<?php

namespace App\ClientModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class CorporateUser extends Model
{
    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'corporate_users';
}
