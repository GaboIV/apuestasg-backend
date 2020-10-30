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
        $this->call(AccountsTableSeeder::class);
        $this->call(AssistsTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(BetTypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ChangelogsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ConfigurationTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);
        $this->call(HarasTableSeeder::class);
        $this->call(HorsesTableSeeder::class);
        $this->call(JockeysTableSeeder::class);
        $this->call(LeagueTeamTableSeeder::class);
        $this->call(LeaguesTableSeeder::class);
        $this->call(MatchStructuresTableSeeder::class);
        $this->call(ParishesTableSeeder::class);
        $this->call(PitchersTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(RacecoursesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(StudsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TrainersTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
