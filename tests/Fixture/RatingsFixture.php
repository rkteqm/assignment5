<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RatingsFixture
 */
class RatingsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'car_id' => 1,
                'star' => 1,
                'review' => 'Lorem ipsum dolor sit amet',
                'user_name' => 'Lorem ipsum dolor sit amet',
                'time' => '2023-01-30 06:12:24',
            ],
        ];
        parent::init();
    }
}
