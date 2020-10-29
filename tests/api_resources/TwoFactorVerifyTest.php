<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\TwoFactorVerify
 */
final class TwoFactorVerifyTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '12ade33a-21c0-473b-b055-b3c836e1c292';
    const TEST_PHONE_NUMBER = '+13035551234';
    const TEST_VERIFICATION_CODE = '17686';

    /*
    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/2fa_verifications'
        );
        $resource = TwoFactorVerify::create([
            "phone_number" => self::TEST_PHONE_NUMBER,
            "twofa_profile_id" => self::TEST_RESOURCE_ID,
            "type" => "sms"
        ]);
        $this->assertInstanceOf(\Telnyx\TwoFactorVerify::class, $resource);
    }
    */

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/2fa_verifications/' . urlencode(self::TEST_RESOURCE_ID)
        );
        $resource = TwoFactorVerify::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Telnyx\TwoFactorVerify::class, $resource);
    }

    /*
    public function testRetrieveByPhoneNumber()
    {
        $this->expectsRequest(
            'get',
            '/v2/2fa_verifications/by_tn/' . urlencode(self::TEST_PHONE_NUMBER)
        );
        $resource = TwoFactorVerify::retrieve_by_phone_number(self::TEST_PHONE_NUMBER);
        $this->assertInstanceOf(\Telnyx\TwoFactorVerify::class, $resource);
    }

    public function testSubmitVerification()
    {
        $this->expectsRequest(
            'post',
            '/v2/2fa_verifications/by_tn/' . urlencode(self::TEST_PHONE_NUMBER) . '/actions/verify'
        );
        $resource = TwoFactorVerify::submit_verification(self::TEST_PHONE_NUMBER, self::TEST_VERIFICATION_CODE);
        $this->assertInstanceOf(\Telnyx\TwoFactorVerify::class, $resource);
    }
    */

}
