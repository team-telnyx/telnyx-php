<?php

namespace Telnyx;

/**
 * Class TwoFactorProfile
 *
 * @package Telnyx
 */
class TwoFactorVerify extends ApiResource
{
    const OBJECT_NAME = "twofa_verification";

    use ApiOperations\Create;
    use ApiOperations\Retrieve;

    /**
     * @return string The endpoint associated with this singleton class.
     */
    public static function classUrl()
    {
        // Use a custom URL for this resource
        // NOTE: This endpoint is special because object name is "twofa_verification" and endpoint is "2fa_verifications"
        return "/v2/2fa_verifications";
    }

    /**
     * Retrieve a 2FA verification by phone number.
     *
     * @param string $phone_number
     * @param array|string|null $options
     *
     * @return \Telnyx\TwoFactorVerify
     */
    public static function retrieve_by_phone_number($phone_number, $options = null)
    {
        $url = '/v2/2fa_verifications/by_tn/' . urlencode($phone_number);

        list($response, $opts) = static::_staticRequest('get', $url, null, $options);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }

    /**
     * Submit a 2FA verification code
     *
     * @param string $phone_number
     * @param string $verification_code
     * @param array|string|null $options
     *
     * @return \Telnyx\TelnyxObject
     */
    public static function submit_verification($phone_number, $verification_code, $options = null)
    {
        $params = ['code' => $verification_code];
        self::_validateParams($params);
        $url = '/v2/2fa_verifications/by_tn/' . urlencode($phone_number) . '/actions/verify';

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }
}
