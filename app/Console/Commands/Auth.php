<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Auth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:auth {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes an authorization and returns an authentication token';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = User::where('email', $this->argument('email'))->first();
        if ($user === null || !Hash::check($this->argument('password'), $user->password)) {
            exit("Login or password is invalid\n");
        }
        $user->api_token = hash('sha256', Str::random(60));
        $user->expired_at = strtotime('+ 5 mins');
        $user->save();
        exit("Your api token: $user->api_token\n");
    }
}
