<?php
namespace M9snikfeed\PhpShikimori\Tests\OAuth;

use PHPUnit\Framework\TestCase;
use M9snikfeed\PhpShikimori\OAuth\ShikimoriOAuth as OAuth;

final class ShikimoriOAuthTest extends TestCase
{

    protected const CLIENT_ID = "bce7ad35b631293ff006be882496b29171792c8839b5094115268da7a97ca34c";
    protected const CLIENT_SECRET = "811459eada36b14ff0cf0cc353f8162e72a7d6e6c7930b647a5c587d1beffe68";
    protected const REDIRECT_URI = "urn%3Aietf%3Awg%3Aoauth%3A2.0%3Aoob";
    protected const USER_AGENT = "Api Test";

    /**
     * @var OAuth
     */
    private OAuth $oauth;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function setUp(): void
    {
        $this->oauth = new OAuth(self::USER_AGENT);
    }

    /**
     * @covers OAuth::GetAuthorizationUrl
     * @return void
     */
    public function testGetAuthorizationUrl(){
        $url = $this->oauth->getAuthorizationUrl(self::CLIENT_ID, self::REDIRECT_URI);
        $this->assertIsString($url);
    }

}