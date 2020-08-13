<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:custom 
    {--r|refresh=all : accounts, psgc,}
    {--s|seed : Indicates if the seed task should be re-run}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs db:wipe then migrate command in specified table order.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $psgcPath = 'prpcmblmts/';
        $refresh = $this->option('refresh');
        $this->info('Refreshing '.$refresh);

        switch ($refresh) {
            case 'accounts':
                // Load migration files related to accounts in order
                $migrations = [
                    '2014_10_12_000000_create_users_table.php',
                    '2014_10_12_100000_create_password_resets_table.php',
                    '2018_08_08_100000_create_telescope_entries_table.php',
                    '2019_08_19_000000_create_failed_jobs_table.php',
                    '2020_07_24_054417_create_statuses_table.php',
                    '2020_07_23_031752_create_account_types_table.php',
                    '2020_07_24_114851_create_employees_table.php',
                    '2020_07_16_053035_creates_accounts_table.php',
                    '2020_08_08_104714_add_deleted_at_column_to_accounts.php',
                    '2020_08_08_125206_add_deleted_at_column_to_employees.php'
                ];
                break;

            case 'psgc':
                // Load migration files related to psgc
                // can be loaded in any order since they don't have foreign keys
                $migrations = [
                    $psgcPath.'1995_10_23_100000_create_philippine_regions_table.php',
                    $psgcPath.'1995_10_23_200000_create_philippine_provinces_table.php',
                    $psgcPath.'1995_10_23_300000_create_philippine_cities_table.php',
                    $psgcPath.'1995_10_23_400000_create_philippine_barangays_table.php'
                ];
                break;
            
            default:
                // Load all migration files in order
                $migrations = [
                    '2014_10_12_000000_create_users_table.php',
                    '2014_10_12_100000_create_password_resets_table.php',
                    '2018_08_08_100000_create_telescope_entries_table.php',
                    '2019_08_19_000000_create_failed_jobs_table.php',
                    '2020_07_24_054417_create_statuses_table.php',
                    '2020_07_23_031752_create_account_types_table.php',
                    '2020_07_24_114851_create_employees_table.php',
                    '2020_07_16_053035_creates_accounts_table.php',
                    '2020_08_08_104714_add_deleted_at_column_to_accounts.php',
                    '2020_08_08_125206_add_deleted_at_column_to_employees.php',
                    $psgcPath.'1995_10_23_100000_create_philippine_regions_table.php',
                    $psgcPath.'1995_10_23_200000_create_philippine_provinces_table.php',
                    $psgcPath.'1995_10_23_300000_create_philippine_cities_table.php',
                    $psgcPath.'1995_10_23_400000_create_philippine_barangays_table.php'
                ];
                break;
        }

        // call db:wipe
        $this->call('db:wipe');

        // create progress bar
        $bar = $this->output->createProgressBar(count($migrations));
        $bar->start();

        $this->line('');

        // call migrate for each specified migration
        foreach ($migrations as $migration) {
            $basePath = '/database/migrations/';
            $migrationName = trim($migration);
            $path = $basePath.$migrationName;

            $this->call('migrate', [
                '--path' => $path,
                '--force' => true,
            ]);
            $bar->advance();
            $this->line('');
        }

        $bar->finish();

        // Run this part if --seed option is passed
        if ($this->option('seed')) {
            $this->info('Seeding '.$refresh);

            switch ($refresh) {
                case 'accounts':
                    $seeds = [
                        'DatabaseSeeder',
                    ];
                    break;

                case 'psgc':
                    $seeds = [
                        'PhilippineRegionsTableSeeder',
                        'PhilippineProvincesTableSeeder',
                        'PhilippineCitiesTableSeeder',
                        'PhilippineBarangaysTableSeeder'
                    ];
                    break;
                
                default:
                    $seeds = [
                        'DatabaseSeeder',
                        'PhilippineRegionsTableSeeder',
                        'PhilippineProvincesTableSeeder',
                        'PhilippineCitiesTableSeeder',
                        'PhilippineBarangaysTableSeeder'
                    ];
                    break;
            }

            // create progress bar
            $bar = $this->output->createProgressBar(count($seeds));
            $bar->start();

            $this->line('');

            // call migrate for each specified seed
            foreach ($seeds as $seed) {
                //$basePath = '/database/seeds/';
                //$migrationName = trim($seed);
                //$path = $basePath.$migrationName;

                $this->call('db:seed', [
                    '--class' => $seed,
                    '--force' => true,
                ]);
                $bar->advance();
                $this->line('');
            }

            $bar->finish();
        }
    }
}
