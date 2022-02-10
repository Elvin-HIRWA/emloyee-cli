<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\DB;

class UpdateEmployee extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = '5 {id}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'To Update an Employe whose ID is Specified';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $employee = DB::table('employee')->find($this->argument('id'));
        if($employee){

            $name = $this->ask('Update your Name');
            if($name === null){
                $this->warn("invalid name");
                return;
            }
            $email = $this->ask('Update your Email');
            if($email === null && filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $this->warn("invalid email");
                return;
            }
            $phone = $this->ask('Update your Phone number');
            DB::table('employee')
              ->where('id', $this->argument('id'))
              ->update([
                  'name' => $name,
              'email' => $email,
              'phone' => $phone
            ]);
            $this->notify('Notification','an Employee is Updated','Images/edit.jpg');  
        }
     else {
         echo 'There is no employee with this ID';
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
