<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ParishesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(PlayersTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        $this->call(LeaguesTableSeeder::class);

        $this->call(TeamsTableSeeder::class);
        // $this->call(LeagueTeamTableSeeder::class);

        $this->call(RacecoursesTableSeeder::class);
        $this->call(HarasTableSeeder::class);
        $this->call(StudsTableSeeder::class);
        $this->call(TrainersTableSeeder::class);
        $this->call(JockeysTableSeeder::class);
        $this->call(HorsesTableSeeder::class);

        $this->call(BanksTableSeeder::class);
        $this->call(AccountsTableSeeder::class);

        $this->call(BetTypesTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);

        // $this->call(AssistsTableSeeder::class);
        $this->call(ChangelogsTableSeeder::class);
        $this->call(ConfigurationTableSeeder::class);

        $this->call(MatchStructuresTableSeeder::class);

        $this->call(PitchersTableSeeder::class);
        // $this->call(TransactionsTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);

        
    }
}
