<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\DB;

class ReadEmployeeDetails extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = '2 {id}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'to show employee whose ID specified';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $employee = DB::table('employee')->find($this->argument('id'));
        if($employee){
            $this->info('ID: ' . $employee->id . '    Name:  '. $employee->name);
        }else{
            $this->info('there is no Employee with this ID');
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
