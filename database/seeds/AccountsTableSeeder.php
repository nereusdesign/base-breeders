<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('accounts')->delete();
        
        \DB::table('accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'accountName' => 'Lifetime Breeder Account',
                'accountKey' => 'd5ajf3dY6sncW2958fhA490gmfjrKf435',
                'stripePayAmount' => '1999',
                'amount' => 19.989999999999998,
                'stripeTimeAmount' => '0',
                'timeAmount' => 'Lifetime',
                'created_at' => '2017-08-24 04:00:00',
                'updated_at' => '2017-08-24 04:00:00',
                'ready' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'accountName' => '3 Month Breeder Account',
                'accountKey' => 'yhwAtynGJAanjyaGm8sJNvIarYRroeCVj0',
                'stripePayAmount' => '599',
                'amount' => 5.9900000000000002,
                'stripeTimeAmount' => '3M',
                'timeAmount' => '3 Months',
                'created_at' => '2017-08-24 04:00:00',
                'updated_at' => '2017-08-24 04:00:00',
                'ready' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'accountName' => '6 Month Breeder Account',
                'accountKey' => '2kxEY1g8u0lrr4EHvAKqBLRY4LZtNjUzuA',
                'stripePayAmount' => '999',
                'amount' => 9.9900000000000002,
                'stripeTimeAmount' => '6M',
                'timeAmount' => '6 Months',
                'created_at' => '2017-08-24 04:00:00',
                'updated_at' => '2017-08-24 04:00:00',
                'ready' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'accountName' => '1 Year Breeder Account',
                'accountKey' => 'wm5UjPo40IXShS0noNgkPo0RzrZeVgM0q2',
                'stripePayAmount' => '1499',
                'amount' => 14.99,
                'stripeTimeAmount' => '1Y',
                'timeAmount' => '1 Year',
                'created_at' => '2017-08-24 04:00:00',
                'updated_at' => '2017-08-24 04:00:00',
                'ready' => 0,
            ),
        ));
        
        
    }
}