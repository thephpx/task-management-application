<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Jul-17
 * Time: 11:45 AM
 */

namespace App\Repositories;

use App\Crew;

class CrewsRepository
{

    public static function createCrew($request)
    {

        $crew = Crew::create([
            'name'     => $request['name'],
            'user_id'  => auth()->user()->id,
            'persons'  => $request['persons'],
            'type'     => $request['type']
        ]);

        return $crew;

    }

}