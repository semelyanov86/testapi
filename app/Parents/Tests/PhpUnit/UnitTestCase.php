<?php


namespace Parents\Tests\PhpUnit;


class UnitTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Setup the test environment, before each test.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Reset the test environment, after each test.
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }
}
