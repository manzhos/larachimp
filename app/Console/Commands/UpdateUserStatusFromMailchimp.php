<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class UpdateUserStatusFromMailchimp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailchimp:updateuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users status from mailchimp list';

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
            if(Newsletter::hasMember($user->email))
            {
                $user->subscribe_status = Newsletter::isSubscribed($user->email);
                $user->syncdate = date('Y-m-d H:i:s');
                $user->save();
                if($user->subscribe_status)
                {
                    $this->info('..is subscribed');
                }
                else
                {
                    $this->info('..is unsubscribed');
                }
            }
            else
            {
                $this->info('The user does not present in Mailchimp list.');
            }
        }

        $this->info('Users status is updated');
    }
}
