<?php

namespace PayPal\Test\Api;

use PayPal\Api\OpenIdError;
use PHPUnit\Framework\TestCase;

/**
 * Test class for OpenIdError.
 *
 */
class OpenIdErrorTest extends TestCase
{

    /** @var  OpenIdError */
    private $error;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->error = new OpenIdError();
        $this->error->setErrorDescription('error description')
            ->setErrorUri('http://developer.paypal.com/api/error')
            ->setError('VALIDATION_ERROR');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    /**
     * @test
     */
    public function testSerializationDeserialization()
    {
        $errorCopy = new OpenIdError();
        $errorCopy->fromJson($this->error->toJson());

        $this->assertEquals($this->error, $errorCopy);
    }
}
