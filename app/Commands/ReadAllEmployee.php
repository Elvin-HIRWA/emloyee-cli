<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\DB;

class ReadAllEmployee extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = '1';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'to read all employee';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['ID','Name'];
        $employees = DB::table('employee')->get();
        foreach ($employees as $employee) {
            $this->info('ID:' . $employee->id . '    Name:' . $employee->name);
        // $this->table($headers,$employees);
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
