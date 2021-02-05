<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
//use Spatie\Newsletter\Newsletter;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class SendUserToMailchimp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailchimp:senduser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send users data to mailchimp list';

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
        $users = User::all();

        foreach ($users as $user)
        {
            $this->info($user->name);

            Newsletter::subscribe($user->email, ['FNAME'=>$user->name, 'LNAME'=>$user->surname]);

            $user->subscribe_status = true;
            $user->syncdate = date('Y-m-d H:i:s');
            $user->save();
        }

        $this->info('Users data sent to Mailchimp list');
    }
}
