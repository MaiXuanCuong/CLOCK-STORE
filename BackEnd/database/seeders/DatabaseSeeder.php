<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            SupplierSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProdustImageSeeder::class,
            CustomerSeeder::class,
            GroupSeeder::class,
            RoleSeeder::class,
            GroupRoleSeeder::class,
            UserSeeder::class,
        ]);
        $this->importGroup();
        $this->importRoles();
        $this->importRole();
        $this->importRole2();
        $this->importRole3();
        $this->importGroupRole();
        $this->importGroupRole_1();
        $this->importUser();
    }
    public function importRoles()
    {
        $groups = ['Category', 'User', 'Supplier', 'Product', 'Group','Brand'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }

    public function importRole()
    {
        $groups = ['Customer', 'Order'];
        $actions = ['viewAny', 'view'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRole2()
    {
        $groups = ['Product', 'Order'];
        $actions = ['status'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRole3()
    {
        $groups = ['Customer'];
        $actions = ['delete','restore','forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }

    public function importGroupRole()
    {
        for ($i = 1; $i <= 42; $i++) {
            DB::table('group_roles')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importGroupRole_1()
    {
        for ($i = 43; $i <= 51; $i++) {
            DB::table('group_roles')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }

    public function importGroup()
    {
        $group = new Group();
        $group->name = 'Supper Admin';
        $group->save();

        $group = new Group();
        $group->name = 'Qu???n L??';
        $group->save();

        $group = new Group();
        $group->name = 'Gi??m ?????c';
        $group->save();


        $group = new Group();
        $group->name = 'Nh??n Vi??n';
        $group->save();
    }

    public function importUser()
    {
        $user = new User();
        $user->name = 'Phan Ng???c C?????ng';
        $user->email = 'cuong@gmail.com';
        $user->password = Hash::make('123');
        $user->phone = '0337868789';
        $user->birthday = '1996-07-07';
        $user->address = '133 L?? Th?????ng Ki???t';
        $user->image = 'aluy.jpg';
        $user->gender = 'Nam';
        $user->province_id = '1';
        $user->district_id = '1';
        $user->ward_id = '1';
        $user->group_id = '1';
        $user->save();

        $user = new User();
        $user->name = 'Ph??ng V??n Phi';
        $user->email = 'phi@gmail.com';
        $user->password = Hash::make('123');
        $user->phone = '0777333274';
        $user->birthday = '2002-04-24';
        $user->address = '74 H??ng V????ng';
        $user->image = 'cuong.jpg';
        $user->gender = 'Nam';
        $user->province_id = '1';
        $user->district_id = '1';
        $user->ward_id = '1';
        $user->group_id = '1';
        $user->save();

        $user = new User();
        $user->name = 'Ho??ng Thanh H???i';
        $user->email = 'hai@gmail.com';
        $user->password = Hash::make('123');
        $user->phone = '0916663237';
        $user->birthday = '2003-06-27';
        $user->address = '202 Huy???n Tr??n C??ng Ch??a';
        $user->image = 'phi.jpg';
        $user->gender = 'Nam';
        $user->province_id = '4';
        $user->district_id = '4';
        $user->ward_id = '4';
        $user->group_id = '4';
        $user->save();

        $user = new User();
        $user->name = 'Nguy???n Ng???c D????ng';
        $user->email = 'duong@gmail.com';
        $user->password = Hash::make('123');
        $user->phone = '0123456789';
        $user->birthday = '2001-03-21';
        $user->address = '33 L?? Th??i T???';
        $user->image = 'vinh.jpg';
        $user->gender = 'Nam';
        $user->province_id = '5';
        $user->district_id = '5';
        $user->ward_id = '5';
        $user->group_id = '2';
        $user->save();

        $user = new User();
        $user->name = 'Tr???n Ng???c Vinh';
        $user->email = 'vinh@gmail.com';
        $user->password = Hash::make('123');
        $user->phone = '0123456788';
        $user->birthday = '2001-11-11';
        $user->address = '22 M?? Si??u';
        $user->image = 'fgr.jpg';
        $user->gender = 'Nam';
        $user->province_id = '6';
        $user->district_id = '6';
        $user->ward_id = '6';
        $user->group_id = '2';
        $user->save();
    }
}
