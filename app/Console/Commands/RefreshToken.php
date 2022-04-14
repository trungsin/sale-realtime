<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RefreshToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accounts:refresh-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew the User access token';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = DB::table('accounts')
            ->where('active', '1')
            ->whereNull('deleted_at')
            ->where('expires_in', '<=', now('UTC')->addMinutes(15)->toDateTimeString())
            ->where('refresh_token_expires_in', '>', now('UTC')->toDateTimeString())
            ->pluck('id')
        ;

        if (count($items)) {
            $this->refreshToken($items);
        }
    }

    protected function refreshToken($items, $index = 0)
    {
        AccountController::refreshToken($items[$index]);
        ++$index;

        if ($index < count($items)) {
            $this->refreshToken($items, $index++);
        }
    }
}
