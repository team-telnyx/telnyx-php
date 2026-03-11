<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbersContract;
use Telnyx\Services\Whatsapp\PhoneNumbers\CallingSettingsService;
use Telnyx\Services\Whatsapp\PhoneNumbers\ProfileService;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams\VerificationMethod;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @api
     */
    public PhoneNumbersRawService $raw;

    /**
     * @api
     */
    public CallingSettingsService $callingSettings;

    /**
     * @api
     */
    public ProfileService $profile;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumbersRawService($client);
        $this->callingSettings = new CallingSettingsService($client);
        $this->profile = new ProfileService($client);
    }

    /**
     * @api
     *
     * List Whatsapp phone numbers
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Whatsapp phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resend verification code
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resendVerification(
        string $phoneNumber,
        VerificationMethod|string $verificationMethod = 'sms',
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['verificationMethod' => $verificationMethod]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resendVerification($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submit verification code for a phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        string $code,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['code' => $code]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
