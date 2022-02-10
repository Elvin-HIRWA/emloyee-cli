<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\DB;

class CreateEmployee extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = '4';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'To Create an Employee';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Enter your Name');
        if($name === null){
            $this->warn("invalid name");
            return;
        }
        $email = $this->ask('Enter your Email');
        if($email === null && filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $this->warn("invalid email");
            return;
        }
        $phone = $this->ask('Enter your Phone number');


        DB::table('employee')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);

    $this->notify('Notification','New Record Inserted','Images/add.png');
    
    }
        // $employee = DB::table('employee')->find($this->argument('id'));
        // if($employee){
            // $this->info($email.'   '. $name.'   '.$phone);
        // }else{
            // $this->info('there is no Employee with this ID');
        // }
    

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
