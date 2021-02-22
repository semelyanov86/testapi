<?php

namespace Parents\Tests\PhpUnit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{

    use RefreshDatabase, CreatesApplication;

    public bool $seed = true;


    /**
     * Setup the test environment, before each test.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Reset the test environment, after each test.
     */
    public function tearDown() : void
    {
        parent::tearDown();
    }


}
