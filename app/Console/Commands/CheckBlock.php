<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\BatDongSan;
use App\Models\DuAn;
use Carbon\Carbon;
class CheckBlock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:check-block';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check-block';

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
        $du_ans =DuAn::where('tinh_trang','mo ban')->get();
        
        foreach ($du_ans as $key => $du_an) {
            $time = Carbon::now()->sub('minute', $du_an->so_phut_book_dat_cho);
            BatDongSan::where([['ngay_dat_cho','<',$time],['tinh_trang','=','booking']])
                        ->update([
                                    'tinh_trang' => 'con',
                                    'ngay_dat_cho'=>null,
                                    'id_user_dat_cho'=>null,
                                    'ho_ten_khach_hang_dat_cho'=>null,
                                    'so_cmnd_khach_hang_dat_cho'=>null
                                ]);
        }
    }
}
