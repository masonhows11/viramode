<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create admins

        // admin 1  has  super_admin role
        $admin1 = Admin::create([
            'name' => 'naeem_soltany',
            'first_name' => 'naeem',
            'last_name' => 'soltany',
            'mobile' => '09917230927',
            'email' => 'mason.hows11@gmail.com',
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

        // admin 2 has admin role
        $admin2 = Admin::create([
            'name' => 'joe_james',
            'first_name' => 'joe',
            'last_name' => 'james',
            'mobile' => '09172890423',
            'email' => 'joe.james556@gmail.com',
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

        // admin 3 do not have any admin role
        $admin3 = Admin::create([
            'name' => 'sara137',
            'first_name' => 'sara',
            'last_name' => 'redField',
            'mobile' => '09179817599',
            'email' => 'sara.ebrahimy@gmail.com',
            //'token'=>  mt_rand(111111,999999),
            //'token_verified_at' => Carbon::now(),
        ]);

        $super_admin = Role::create(['guard_name' => 'admin', 'name' => 'super_admin']);
        $role_admin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $admin1->assignRole($super_admin);
        $admin2->assignRole($role_admin);


        $users = [
            [
                'name' => 'naeem_sol',
                'first_name' => 'naeem',
                'last_name' => 'soltany',
                'mobile' => '09917230927',
                'password' => Hash::make('123456'),
                'email' => 'mason.hows11@gmail.com',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'mason_hows11',
                'first_name' => 'mason',
                'last_name' => 'hows',
                'mobile' => '09179817599',
                'password' => Hash::make('123456'),
                'email' => 'mason.hows12@gmail.com',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'joe_james',
                'first_name' => 'joe',
                'last_name' => 'james',
                'mobile' => '09172890423',
                'password' => Hash::make('123456'),
                'email' => 'joe.james556@gmail.com',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'james',
                'first_name' => 'joe',
                'last_name' => 'james',
            ],
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
            ],
            [
                'name' => 'nicky',
                'first_name' => 'nick',
                'last_name' => 'wilson',
                'email' => 'nicky.wilson21@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230929',

            ],
            [
                'name' => 'Mary',
                'first_name' => 'maria',
                'last_name' => 'watson',
                'email' => 'mary.watson90@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230925',
            ],
            [
                'name' => 'John97',
                'first_name' => 'John',
                'last_name' => 'marston',
                'email' => 'john.marston1870@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230922',

            ],
            [
                'name' => 'David',
                'first_name' => 'David120',
                'last_name' => 'Bombal',
                'email' => 'david.bombal11@gmail.com',
                'password' => Hash::make('1289..//**'),
                'mobile' => '09917230911',
            ],

        ];


        foreach ($users as $user) {
            User::create($user);
        }

        // category seed
        $category = Category::create([
            'title_english' => 'category-women\'s-dress',
            'title_persian' => 'زنانه',
        ]);
        $category->child()->saveMany([
            new Category([
                'title_english' => 'category-women\'s-dress-socks',
                'title_persian' => 'جوراب زنانه',
            ]),
            new Category([
                'title_english' => 'category-women\'s-dress-pants',
                'title_persian' => 'شلوار زنانه',
            ]),
            new Category([
                'title_english' => 'category-women\'s-dress-t-shirt',
                'title_persian' => 'تی شرت زنانه',
            ])
        ]);

        $category2 = Category::create([
            'title_english' => 'category-Men\'s-wear',
            'title_persian' => 'مردانه',
        ]);
        $category2->child()->saveMany([
            new Category([
                'title_english' => 'category-Men\'s-wear-socks',
                'title_persian' => 'جوراب مردانه',
            ]),
            new Category([
                'title_english' => 'category-Men\'s-wear-pants',
                'title_persian' => 'شلوار مردانه',
            ]),
            new Category([
                'title_english' => 'category-Men\'s-wear-t-shirt',
                'title_persian' => 'تی شرت مردانه',
            ])
        ]);

        $category3 = Category::create([
            'title_english' => 'category-girls-clothes',
            'title_persian' => 'دخترانه',
        ]);
        $category3->child()->saveMany([
            new Category([
                'title_english' => 'category-girls-clothes-socks',
                'title_persian' => 'جوراب دخترانه',
            ]),
            new Category([
                'title_english' => 'category-girls-clothes-pants',
                'title_persian' => 'شلوار دخترانه',
            ]),
            new Category([
                'title_english' => 'category-girls-clothes-t-shirt',
                'title_persian' => 'تی شرت دخترانه',
            ])
        ]);

        $category4 = Category::create([
            'title_english' => 'category-Boys-clothes',
            'title_persian' => 'پسرانه',
        ]);
        $category4->child()->saveMany([
            new Category([
                'title_english' => 'category-Boys-clothes-socks',
                'title_persian' => ' جوراب پسرانه',
            ]),
            new Category([
                'title_english' => 'category-Boys-clothes-pants',
                'title_persian' => 'شلوار پسرانه',
            ]),
            new Category([
                'title_english' => 'category-Boys-clothes-t-shirt',
                'title_persian' => ' تی شرت پسرانه',
            ])
        ]);


        //        $admins = [
        //            [
        //                'name' => 'naeem_soltany',
        //                'first_name' => 'naeem',
        //                'last_name' => 'soltany',
        //                'mobile' => '09917230927',
        //                'email' => 'mason.hows11@gmail.com',
        //            ],
        //            [
        //                'name' => 'joe_james',
        //                'first_name' => 'joe',
        //                'last_name' => 'james',
        //                'mobile' => '09172890423',
        //                'email' => 'joe.james556@gmail.com',
        //            ],
        //            [
        //                'name' => 'sara137',
        //                'first_name' => 'sara',
        //                'last_name' => 'redField',
        //                'mobile' => '09179817599',
        //                'email' => 'sara.ebrahimy@gmail.com',
        //            ]
        //        ];
        //        foreach ($admins as $admin) {
        //            Admin::create($admin);
        //        }

        // \App\Models\Product::factory(10)->create();

        // category seed
        //        $category = Category::create([
        //            'title_english' => 'cat-digital-product',
        //            'title_persian' => 'کالای دیجیتال',
        //        ]);
        //        $category->child()->saveMany([
        //            $com = new Category([
        //                'title_english' => 'cat-computer',
        //                'title_persian' => 'کامپیوتر',
        //            ]),
        //            $lap = new Category([
        //                'title_english' => 'cat-laptop',
        //                'title_persian' => 'لپ تاپ',
        //            ]),
        //            $mob = new Category([
        //                'title_english' => 'cat-mobile',
        //                'title_persian' => 'موبایل',
        //            ])
        //
        //        ]);
        //        $category2 = Category::create([
        //            'title_english' => 'cat-vehicle-tools',
        //            'title_persian' => 'خودرو و ابزار',
        //        ]);
        //        $category2->child()->saveMany([
        //            new Category([
        //                'title_english' => 'cat-cars',
        //                'title_persian' => 'خودرو ها',
        //            ]),
        //            new Category([
        //                'title_english' => 'cat-motorbikes',
        //                'title_persian' => 'موتور سیکلت',
        //            ])
        //        ]);
        //
        //        $category3 = Category::create([
        //            'title_english' => 'cat-Fashion-clothing',
        //            'title_persian' => 'مد و پوشاک',
        //        ]);
        //        $category3->child()->saveMany([
        //            new Category([
        //                'title_english' => 'cat-men-clothing',
        //                'title_persian' => 'پوشاک مردانه',
        //            ]),
        //            new Category([
        //                'title_english' => 'cat-women-clothing',
        //                'title_persian' => 'پوشاک زنانه',
        //            ])
        //        ]);
        //
        //        $category4 = Category::create([
        //            'title_english' => 'cat-toys-child-health',
        //            'title_persian' => 'اسباب بازی و کودک',
        //        ]);
        //        $category4->child()->saveMany([
        //            new Category([
        //                'title_english' => 'cat-health-bathroom-kids',
        //                'title_persian' => 'بهداشت و حمام کودک',
        //            ]),
        //            new Category([
        //                'title_english' => 'cat-kids-clothing',
        //                'title_persian' => 'کفش و لباس کودک',
        //            ])
        //        ]);
        //
        //        $categories = [
        //            [
        //                'title_english' => 'cat-supermarket-goods',
        //                'title_persian' => 'کالا های سوپر مارکتی',
        //            ],
        //            [
        //                'title_english' => 'cat-beauty-health',
        //                'title_persian' => 'بهداشت و سلامت',
        //            ],
        //            [
        //                'title_english' => 'cat-home-kitchen',
        //                'title_persian' => 'خانه و آشپزخانه',
        //            ],
        //            [
        //                'title_english' => 'cat-books-and-stationery',
        //                'title_persian' => 'کتاب و لوازم التحریر',
        //            ],
        //            [
        //                'title_english' => 'cat-sports-and-travel',
        //                'title_persian' => 'ورزش و سفر',
        //            ]
        //
        //        ];
        //        foreach ($categories as $category) {
        //            Category::create($category);
        //        }

        // brands
        //        $brands = [
        //            [
        //                'title_persian' => 'ال جی',
        //                'title_english' => 'LG',
        //            ],
        //            [
        //                'title_persian' => 'سامسونگ',
        //                'title_english' => 'Samsung',
        //            ],
        //            [
        //                'title_persian' => 'ایسر',
        //                'title_english' => 'Acer',
        //            ],
        //            [
        //
        //                'title_persian' => 'ایسوس',
        //                'title_english' => 'Asus',
        //            ],
        //            [
        //                'title_persian' => 'شیائومی',
        //                'title_english' => 'Xiaomi',
        //            ],
        //            [
        //                'title_persian' => 'لنوو',
        //                'title_english' => 'Lenovo',
        //            ],
        //            [
        //                'title_persian' => 'اچ پی',
        //                'title_english' => 'Hp',
        //            ]
        //            , [
        //                'title_persian' => 'دل',
        //                'title_english' => 'Dell',
        //            ],
        //            [
        //                'title_persian' => 'هواوی',
        //                'title_english' => 'huawei',
        //            ],
        //            [
        //                'title_persian' => 'اپل',
        //                'title_english' => 'apple',
        //            ],
        //            [
        //                'title_persian' => 'نوکیا',
        //                'title_english' => 'nokia',
        //            ]
        //        ];
        //        foreach ($brands as $brand) {
        //            Brand::create($brand);
        //        }
    }
}
