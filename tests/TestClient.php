<?php
/**
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use CompropagoSdk\Client;
use CompropagoSdk\Resources\Payments\Cash;
use CompropagoSdk\Resources\Payments\Spei;
use CompropagoSdk\Resources\Webhooks;
use CompropagoSdk\Resources\Sms;

class TestClient extends TestCase
{
    const PUBLIC_KEY = 'pk_test_638e8b14112423a086';
    const PRIVATE_KEY = 'sk_test_9c95e149614142822f';

    /**
     * Test Client instanciation
     *
     * @return Client
     */
    public function testCreateObject()
    {
        try {
            $obj = new Client(self::PUBLIC_KEY, self::PRIVATE_KEY);

            $this->assertEquals(self::PUBLIC_KEY, $obj->getPublicKey());
            $this->assertEquals(self::PRIVATE_KEY, $obj->getPrivateKey());

            return $obj;
        } catch (\Exception $e) {
            echo "{$e->getMessage()}\n";
            var_dump($e->getTrace());

            $this->assertTrue(false);
            $this->assertTrue(false);
            return null;
        }
    }

    /**
     * Test to obtaine Cash
     *
     * @depends testCreateObject
     *
     * @param Client $obj Client object instance
     */
    public function testGetCashResource(Client $obj)
    {
        try {
            $cash = $obj->getResource(Cash::class);

            $this->assertTrue($cash instanceof Cash);
            $this->assertEquals(
                [self::PRIVATE_KEY, self::PUBLIC_KEY],
                $cash->getAuth()
            );
        } catch (\Exception $e) {
            echo "{$e->getMessage()}\n";
            var_dump($e->getTrace());

            $this->assertTrue(false);
            $this->assertTrue(false);
        }
    }

    /**
     * Test to obtaine Spei
     *
     * @depends testCreateObject
     *
     * @param Client $obj Client object instance
     */
    public function testGetSpeiResource(Client $obj)
    {
        try {
            $resoruce = $obj->getResource(Spei::class);

            $this->assertTrue($resoruce instanceof Spei);
            $this->assertEquals(
                [self::PRIVATE_KEY, self::PUBLIC_KEY],
                $resoruce->getAuth()
            );
        } catch (\Exception $e) {
            echo "{$e->getMessage()}\n";
            var_dump($e->getTrace());

            $this->assertTrue(false);
            $this->assertTrue(false);
        }
    }

    /**
     * Test to obtaine Spei
     *
     * @depends testCreateObject
     *
     * @param Client $obj Client object instance
     */
    public function testGetSmsResource(Client $obj)
    {
        try {
            $resoruce = $obj->getResource(Sms::class);

            $this->assertTrue($resoruce instanceof Sms);
            $this->assertEquals(
                [self::PRIVATE_KEY, self::PUBLIC_KEY],
                $resoruce->getAuth()
            );
        } catch (\Exception $e) {
            echo "{$e->getMessage()}\n";
            var_dump($e->getTrace());

            $this->assertTrue(false);
            $this->assertTrue(false);
        }
    }

    /**
     * Test to obtaine Spei
     *
     * @depends testCreateObject
     *
     * @param Client $obj Client object instance
     */
    public function testGetWebhooksResource(Client $obj)
    {
        try {
            $resoruce = $obj->getResource(Webhooks::class);

            $this->assertTrue($resoruce instanceof Sms);
            $this->assertEquals(
                [self::PRIVATE_KEY, self::PUBLIC_KEY],
                $resoruce->getAuth()
            );
        } catch (\Exception $e) {
            echo "{$e->getMessage()}\n";
            var_dump($e->getTrace());

            $this->assertTrue(false);
            $this->assertTrue(false);
        }
    }

    /**
     * Validate get public key function
     *
     * @depends testCreateObject
     *
     * @param Client $obj Instance of Client object
     */
    public function testGetPublicKey(Client $obj)
    {
        $this->assertEquals(
            self::PUBLIC_KEY,
            $obj->getPublicKey()
        );
    }

    /**
     * Validate get private key
     *
     * @depends testCreateObject
     *
     * @param Client $obj Instance of Client object
     */
    public function testGetPrivateKey(Client $obj)
    {
        $this->assertEquals(
            self::PRIVATE_KEY,
            $obj->getPrivateKey()
        );
    }
}
