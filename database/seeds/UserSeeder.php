<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Đại lý Chung',
            'email' => 'daily@ktg',
            'password' => Hash::make("daily123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nice Land',
            'email' => 'nice@ktg',
            'password' => Hash::make("nice123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Huỳnh Ngọc Hưng',
            'email' => 'hunghn@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Huyền Thị Phụng',
            'email' => 'phunght@ktg',
            'password' => Hash::make("phung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Bùi Huỳnh Tài',
            'email' => 'taibh@ktg',
            'password' => Hash::make("tai123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Trung Sin',
            'email' => 'sin@ktg',
            'password' => Hash::make("sinLT@123"),
            'chuc_vu'=>1
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Hoàng Uyên Phương',
            'email' => 'admin@ktg',
            'password' => Hash::make("phuong@123"),
            'chuc_vu'=>1
        ]);
        DB::table('users')->insert([
            'name' => 'Đặng Nguyên Hoàng Ngân',
            'email' => 'ngandnh@ktg',
            'password' => Hash::make("ngan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Dương Thị Phương Thảo',
            'email' => 'thaodtp@ktg',
            'password' => Hash::make("thao123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thị Như Ý',
            'email' => 'yltn@ktg',
            'password' => Hash::make("y123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hồ Thị Hạnh',
            'email' => 'hanhht@ktg',
            'password' => Hash::make("hanh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Phúc Lân',
            'email' => 'lantp@ktg',
            'password' => Hash::make("lan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Phan Thị Thanh Tâm',
            'email' => 'tamptt@ktg',
            'password' => Hash::make("tam123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Đức Anh',
            'email' => 'anhld@ktg',
            'password' => Hash::make("anh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thị Xuân Phương',
            'email' => 'phuongltx@ktg',
            'password' => Hash::make("phuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Vĩ Cao',
            'email' => 'caolv@ktg',
            'password' => Hash::make("cao123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Văn Thị Lan Anh',
            'email' => 'anhvtl@ktg',
            'password' => Hash::make("anh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Phan Đức Việt',
            'email' => 'vietpd@ktg',
            'password' => Hash::make("viet123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hồng Nguyên Anh Thi',
            'email' => 'thihna@ktg',
            'password' => Hash::make("thi123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Quốc Cường',
            'email' => 'cuongtq@ktg',
            'password' => Hash::make("cuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Vũ',
            'email' => 'vunv@ktg',
            'password' => Hash::make("vu123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Thái Thị Hồng Châu',
            'email' => 'chautth@ktg',
            'password' => Hash::make("chau123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Xuân Cường',
            'email' => 'cuongtx@ktg',
            'password' => Hash::make("cuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Bùi Minh Hiển',
            'email' => 'hienbm@ktg',
            'password' => Hash::make("hien123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Hoàng Phước Bảo',
            'email' => 'baohp@ktg',
            'password' => Hash::make("bao123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Phan Quốc Dũng',
            'email' => 'dungpq@ktg',
            'password' => Hash::make("dung123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Phan Văn Hữu',
            'email' => 'huupv@ktg',
            'password' => Hash::make("huu123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Nguyễn Viết Sơn',
            'email' => 'sonnv@ktg',
            'password' => Hash::make("son123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Phạm Thị Phương Thao',
            'email' => 'thapptp@ktg',
            'password' => Hash::make("thao123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Lê Hữu Trí Tài',
            'email' => 'tailht@ktg',
            'password' => Hash::make("tai123"),
            'chuc_vu'=>0
        ]); 
        DB::table('users')->insert([
            'name' => 'Trương Đình Hùng',
            'email' => 'hungtd@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Đại Nhân',
            'email' => 'nhannd@ktg',
            'password' => Hash::make("nhan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Văn Ái',
            'email' => 'aivv@ktg',
            'password' => Hash::make("ai123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Quốc Huy',
            'email' => 'huyvq@ktg',
            'password' => Hash::make("huy123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Xuân Quý',
            'email' => 'quynx@ktg',
            'password' => Hash::make("quy123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Công Bá Thiện',
            'email' => 'thienldb@ktg',
            'password' => Hash::make("thien123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Lê Hùng',
            'email' => 'hungnl@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Nhật Quang',
            'email' => 'quangnvn@ktg',
            'password' => Hash::make("quang123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hà Đăng Bảo Minh',
            'email' => 'minhhdb@ktg',
            'password' => Hash::make("minh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Phan Đức Vỹ',
            'email' => 'vypd@ktg',
            'password' => Hash::make("vy123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trương Phan Công Thạnh',
            'email' => 'thanhtpc@ktg',
            'password' => Hash::make("thanh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hồ Đắc Hưng',
            'email' => 'hunghd@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Hương Trà',
            'email' => 'tranth@ktg',
            'password' => Hash::make("tra123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Đức Phước',
            'email' => 'phuocnd@ktg',
            'password' => Hash::make("phuoc123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Mai Vũ Hùng',
            'email' => 'hungmv@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Quốc Phong',
            'email' => 'phonglq@ktg',
            'password' => Hash::make("phong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Tôn Thất Trung Hậu',
            'email' => 'hauttt@ktg',
            'password' => Hash::make("hau123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Phan Hồ Duyên Nhi',
            'email' => 'nhiphd@ktg',
            'password' => Hash::make("nhi123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Cường',
            'email' => 'cuongnv@ktg',
            'password' => Hash::make("cuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Huỳnh Văn Phương',
            'email' => 'phuonghv@ktg',
            'password' => Hash::make("phuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Hoàng Bảo Ngọc',
            'email' => 'ngocthb@ktg',
            'password' => Hash::make("ngoc123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hoàng Thị Mỹ Nhung',
            'email' => 'nhunghtm@ktg',
            'password' => Hash::make("nhung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Đỗ Duy Tuấn',
            'email' => 'tuandd@ktg',
            'password' => Hash::make("tuan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Ngô Hoàng Bảo Trung',
            'email' => 'trungnhb@ktg',
            'password' => Hash::make("trung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Đại Nhân',
            'email' => 'nhanld@ktg',
            'password' => Hash::make("nhan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Quang Minh',
            'email' => 'minhnq@ktg',
            'password' => Hash::make("minh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Huỳnh Thị Yến Hồng',
            'email' => 'honghty@ktg',
            'password' => Hash::make("hong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Đạt',
            'email' => 'datnv@ktg',
            'password' => Hash::make("dat123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Đình Dũng',
            'email' => 'dungnd@ktg',
            'password' => Hash::make("dung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thảo Nguyên',
            'email' => 'nguyenlt@ktg',
            'password' => Hash::make("nguyen123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Đào Trung Tiến',
            'email' => 'tiendt@ktg',
            'password' => Hash::make("tien123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Bùi Khắc Dũng',
            'email' => 'dungbk@ktg',
            'password' => Hash::make("dung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thế Nam',
            'email' => 'namnt@ktg',
            'password' => Hash::make("nam123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Đào Trường Hùng',
            'email' => 'hungdt@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Trung Định',
            'email' => 'dinh@ktg',
            'password' => Hash::make("dinh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Văn Hoàng',
            'email' => 'hoanglv@ktg',
            'password' => Hash::make("hoang123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Huỳnh Tấn Hiếu',
            'email' => 'hieuht@ktg',
            'password' => Hash::make("hieu123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Văn Bình',
            'email' => 'binhtv@ktg',
            'password' => Hash::make("binh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Văn Hưng',
            'email' => 'hunglv@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Quang Mẫn',
            'email' => 'manlq@ktg',
            'password' => Hash::make("man123"),
            'chuc_vu'=>0
        ]);DB::table('users')->insert([
            'name' => 'Hồ Thị Ngọc Ánh',
            'email' => 'anhhtn@ktg',
            'password' => Hash::make("anh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Ngô Thị Thảo',
            'email' => 'thaont@ktg',
            'password' => Hash::make("thao123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Đại Thành Nhân',
            'email' => 'nhanvdt@ktg',
            'password' => Hash::make("nhan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Thị Hương',
            'email' => 'huongvt@ktg',
            'password' => Hash::make("huong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Vũ Linh',
            'email' => 'linhlv@ktg',
            'password' => Hash::make("linh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Bùi Trọng Quý',
            'email' => 'quybt@ktg',
            'password' => Hash::make("quy123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Phạm Thị Mỹ Trinh',
            'email' => 'trinhptm@ktg',
            'password' => Hash::make("trinh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Anh Thịnh',
            'email' => 'thinhla@ktg',
            'password' => Hash::make("thinh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thị Trinh',
            'email' => 'trinhlt@ktg',
            'password' => Hash::make("trinh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Thị Thúy Kiều',
            'email' => 'kieuttt@ktg',
            'password' => Hash::make("kieu123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Như Quyên',
            'email' => 'quyenntn@ktg',
            'password' => Hash::make("quyen123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Phương',
            'email' => 'phuongnt@ktg',
            'password' => Hash::make("phuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thái Trung',
            'email' => 'trungnt@ktg',
            'password' => Hash::make("trung123"),
            'chuc_vu'=>0
        ]);

        DB::table('users')->insert([
            'name' => 'Trần Quốc Long',
            'email' => 'longtq@ktg',
            'password' => Hash::make("long123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Dương Viết Hoàng',
            'email' => 'hoangdv@ktg',
            'password' => Hash::make("hoang123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hoàng Thị Kim Oanh',
            'email' => 'oandhtk@ktg',
            'password' => Hash::make("oanh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Lê Quỳnh Lâm',
            'email' => 'lamtlq@ktg',
            'password' => Hash::make("lam123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Anh Tuấn',
            'email' => 'tuanta@ktg',
            'password' => Hash::make("tuan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Thái Tăng Ngọc',
            'email' => 'ngoctt@ktg',
            'password' => Hash::make("ngoc123"),
            'chuc_vu'=>0
        ]);

        DB::table('users')->insert([
            'name' => 'Tống Xuân Hòa',
            'email' => 'hoatx@ktg',
            'password' => Hash::make("hoa123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Thị Thùy Trang',
            'email' => 'trangttt@ktg',
            'password' => Hash::make("trang123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thùy Linh',
            'email' => 'linhlt@ktg',
            'password' => Hash::make("linh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thị Hải Yến',
            'email' => 'yenlth@ktg',
            'password' => Hash::make("yen123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thị Tâm',
            'email' => 'tamlt@ktg',
            'password' => Hash::make("tam123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Tuấn Dũng',
            'email' => 'dunglt@ktg',
            'password' => Hash::make("dung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Hường',
            'email' => 'huongnt@ktg',
            'password' => Hash::make("huong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hồ Nhật Tân',
            'email' => 'tanhn@ktg',
            'password' => Hash::make("tan123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Hữu Trung',
            'email' => 'trungvh@ktg',
            'password' => Hash::make("trung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Thanh Hùng',
            'email' => 'hungtt@ktg',
            'password' => Hash::make("hung123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Ngọc Ly',
            'email' => 'lyntn@ktg',
            'password' => Hash::make("ly123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Viết Phú',
            'email' => 'phuonv@ktg',
            'password' => Hash::make("phu123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Trọng Cường',
            'email' => 'cuongvt@ktg',
            'password' => Hash::make("cuong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Đinh Hoàng Linh',
            'email' => 'linhdh@ktg',
            'password' => Hash::make("linh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Lê Thuận Sỹ',
            'email' => 'sylt@ktg',
            'password' => Hash::make("sy123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Hoàng Đại Trường',
            'email' => 'truonghd@ktg',
            'password' => Hash::make("truong123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Đặng Ngọc Thịnh',
            'email' => 'thinhdn@ktg',
            'password' => Hash::make("thinh123"),
            'chuc_vu'=>0
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Thảo',
            'email' => 'thaont1@ktg',
            'password' => Hash::make("thao123"),
            'chuc_vu'=>0
        ]);
        
        
    }
}
