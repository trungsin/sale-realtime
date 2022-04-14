<?php

use Illuminate\Database\Seeder;
use App\Models\DuAn;
use App\Models\BatDongSan;
use App\Models\PhanKhu;
class DuAnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $du_an = DuAn::create([
    	 	'ma'=>"ANCUU",
            'ten'=>"DỰ ÁN AN CỰU CITY",
            'tinh_trang'=>('mo ban'),
            'so_phut_book_dat_cho'=>3
        ]);
        if($du_an){

            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu A",
                    'ghi_chu' => "Đã Xây",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "A18",
                            'gia' =>  8926120000 ,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "294,7 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "A34",
                            'gia' => 8926120000,
                            'thong_tin' => "Đã Xây Thô",
                            'dien_tich' => "294,7 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu H",
                    'ghi_chu' => "Đã Xây",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "H01",
                            'gia' =>   8541000000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "330,5 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu K",
                    'ghi_chu' => "Đã Xây",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "K07",
                            'gia' =>    16836160000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "353,1 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "K08",
                            'gia' =>     16507480000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "261,8 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "K10",
                            'gia' =>    15996900000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "341,5 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "K21",
                            'gia' =>      18664400000 ,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "341,5 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "K26",
                            'gia' =>     16671160000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "353,1 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "K28",
                            'gia' =>      20064560000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "372,1 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu B",
                    'ghi_chu' => "Đã Xây",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "B17",
                            'gia' =>     9295760000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "314,1 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "B32",
                            'gia' =>     9295760000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "314,1 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu L",
                    'ghi_chu' => "Đã Xây",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "L38",
                            'gia' =>    7414740000,
                            'thong_tin' => "Đã xây thô",
                            'dien_tich' => "245,9 m2 sàn",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            } 
        	
    		$phan_khu = PhanKhu::create([
    			'id_du_an' => $du_an->id,
                'ma' => "Khu N",
	            'ghi_chu' => "Nhà hoàn thiện (không có nội thất rời)",
	            'tinh_trang'=>'con'
    		]);
    		if($phan_khu){
    			for($j=3; $j<=27; $j++){
    				BatDongSan::create([
    					'id_du_an' => $du_an->id,
    					'id_khu' => $phan_khu->id,
    					'ma_lo' => "N-$j",
    					'gia' => 0,
    					'thong_tin' => "Nhà hoàn thiện (không có nội thất rời)",
    					'dien_tich' => "81,5 m2 đất",
    					'id_du_an' => $du_an->id,
		        		'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
		        	]);
    			}
    		}
            $phan_khu = PhanKhu::create([
                'id_du_an' => $du_an->id,
                'ma' => "Khu Q",
                'ghi_chu' => "Nhà hoàn thiện (không có nội thất rời)",
                'tinh_trang'=>'con'
            ]);
            if($phan_khu){
                for($j=1; $j<=21; $j++){
                    if($j == 2){
                        continue;
                    }
                    BatDongSan::create([
                        'id_du_an' => $du_an->id,
                        'id_khu' => $phan_khu->id,
                        'ma_lo' => "Q-$j",
                        'gia' => 0,
                        'thong_tin' => "Nhà hoàn thiện (không có nội thất rời)",
                        'dien_tich' => "81,5 m2 đất",
                        'id_du_an' => $du_an->id,
                        'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                    ]);
                }
            }
            if($phan_khu){
                for($j=26; $j<=50; $j++){
                    BatDongSan::create([
                        'id_du_an' => $du_an->id,
                        'id_khu' => $phan_khu->id,
                        'ma_lo' => "Q-$j",
                        'gia' => 0,
                        'thong_tin' => "Nhà hoàn thiện (không có nội thất rời)",
                        'dien_tich' => "81,5 m2 đất",
                        'id_du_an' => $du_an->id,
                        'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                    ]);
                }
            }    
        	$phan_khu = PhanKhu::create([
                'id_du_an' => $du_an->id,
                'ma' => "Khu S",
                'ghi_chu' => "Nhà hoàn thiện (không có nội thất rời)",
                'tinh_trang'=>'con'
            ]);
            if($phan_khu){
                for($j=1; $j<=13; $j++){
                    BatDongSan::create([
                        'id_du_an' => $du_an->id,
                        'id_khu' => $phan_khu->id,
                        'ma_lo' => "S-$j",
                        'gia' => 0,
                        'thong_tin' => "Nhà hoàn thiện (không có nội thất rời)",
                        'dien_tich' => "81,5 m2 đất",
                        'id_du_an' => $du_an->id,
                        'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                    ]);
                }
            
            }
        }//end an cuu
        $du_an = DuAn::create([
        'ma'=>"DQT",
        'ten'=>"DỰ ÁN: DE 1ST QUANTUM",
        'tinh_trang'=>('mo ban'),
        'so_phut_book_dat_cho'=>3
        ]);
        if($du_an){

            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 2",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-02-03-A2",
                            'gia' =>  1539648000,
                            'thong_tin' => "Một phòng ngủ Góc",
                            'dien_tich' => "58,8 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);	
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-02-07-B4",
                            'gia' =>   2002104000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "78,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-02-08-B4",
                            'gia' =>  1539648000,
                            'thong_tin' => "2 Phòng ngủ",
                            'dien_tich' => "78,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 

        	}
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 3",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-03-07-B3",
                            'gia' =>   2164968000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 4",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-04-02-A1",
                            'gia' =>    1311606000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-04-04-A1",
                            'gia' =>    1311606000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-04-07-B3",
                            'gia' =>    2123334000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-04-09-B3",
                            'gia' =>    2123334000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-04-10-B2",
                            'gia' =>    1757268000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 5",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-05-04-A1",
                            'gia' =>    1311606000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-05-07-B3",
                            'gia' =>    2123334000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-05-09-B3",
                            'gia' =>    1299348000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]); 
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 6",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-06-02-A1",
                            'gia' =>    1299348000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-06-04-A1",
                            'gia' =>    1299348000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);  
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-06-07-B3",
                            'gia' =>    2102517000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);  
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-06-09-B3",
                            'gia' =>    2102517000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-06-10-B2",
                            'gia' =>    1740690000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);  

            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 7",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-07-07-B3",
                            'gia' =>    2060883000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-07-09-B3",
                            'gia' =>    2060883000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-07-10-B2",
                            'gia' =>    1707534000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 8",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-08-02-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-08-03-A2",
                            'gia' =>    1482624000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "58,8 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-08-04-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-08-07-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-08-09-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-08-10-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 9",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-09-02-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-09-04-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-09-06-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-09-10-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 10",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-10-04-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-10-06-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-10-07-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-10-09-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-10-10-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 11",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-11-02-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-11-03-A2",
                            'gia' =>    1482624000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "58,8 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-11-04-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-11-07-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-11-09-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-11-10-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 12",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-12-03-A2",
                            'gia' =>    1482624000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "58,8 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-12-04-A1",
                            'gia' =>    1287090000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-12-08-A3",
                            'gia' =>    1295946000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "49,7 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-12-09-B3",
                            'gia' =>    2081700000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-12-10-B2",
                            'gia' =>    1724112000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Tầng 12",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-02-A1",
                            'gia' =>    1274832000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-03-A2",
                            'gia' =>    1482624000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "58,8 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-04-A1",
                            'gia' =>    1274832000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-06-B2",
                            'gia' =>    1707534000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-07-B3",
                            'gia' =>    2060883000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "84,9 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-04-A1",
                            'gia' =>    1274832000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "51,4 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-08-A3",
                            'gia' =>    1283364000,
                            'thong_tin' => "1 phòng ngủ",
                            'dien_tich' => "49,7 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "DQT-15-10-B2",
                            'gia' =>    1707534000,
                            'thong_tin' => "2 phòng ngủ",
                            'dien_tich' => "69,5 m2",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
        }//end de 1st
        $du_an = DuAn::create([
        'ma'=>"OUD",
        'ten'=>"VẠN XUÂN COMPOUD",
        'tinh_trang'=>('mo ban'),
        'so_phut_book_dat_cho'=>3
        ]);
        if($du_an){

            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu A",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "A01",
                            'gia' =>  0,
                            'thong_tin' => "3 Tầng",
                            'dien_tich' => "226,20  m2 đất",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
                BatDongSan::create([
                            'id_du_an' => $du_an->id,
                            'id_khu' => $phan_khu->id,
                            'ma_lo' => "A02",
                            'gia' =>  0,
                            'thong_tin' => "3 Tầng",
                            'dien_tich' => "187,00 m2 đất",
                            'id_du_an' => $du_an->id,
                            'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                        ]);
            }
            $phan_khu = PhanKhu::create([
                    'id_du_an' => $du_an->id,
                    'ma' => "Khu B",
                    'ghi_chu' => "",
                    'tinh_trang'=>'con'
                ]);
            if($phan_khu){ 
                for($j=1; $j<=20; $j++){
                    BatDongSan::create([
                        'id_du_an' => $du_an->id,
                        'id_khu' => $phan_khu->id,
                        'ma_lo' => "B-$j",
                        'gia' => 0,
                        'thong_tin' => "Nhà hoàn thiện tuỳ chọn full nội nhất",
                        'dien_tich' => "66,97 m2 đất xây dựng",
                        'id_du_an' => $du_an->id,
                        'so_phut_book_dat_cho' => $du_an->so_phut_book_dat_cho
                    ]);
                }

            }
        }

    }
}
