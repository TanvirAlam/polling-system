<?php

use Illuminate\Database\Seeder;
use App\Sport;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        $json = File::get("database/seeds/data/test-assignment.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Sport::create([
                'object_id' => $obj->objectId,
                'group_name' => $obj->group,
                'group_id' => $obj->id,
                'away_name' => $obj->awayName,
                'home_name' => $obj->homeName,
                'players_name' => $obj->name,
                'sports' => $obj->sport,
                'country' => $obj->country,
                'state' => $obj->state,
                'event_date' => Carbon::parse($obj->createdAt),
            ]);
        }
    }
}
