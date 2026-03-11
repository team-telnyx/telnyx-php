<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\BusinessAccounts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\BusinessAccounts\PhoneNumbersContract;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberInitializeVerificationParams\VerificationMethod;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @api
     */
    public PhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * List phone numbers for a WABA
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Initialize Whatsapp phone number verification
     *
     * @param string $id Whatsapp Business Account ID
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initializeVerification(
        string $id,
        string $displayName,
        string $phoneNumber,
        string $language = 'en_US',
        VerificationMethod|string $verificationMethod = 'sms',
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'displayName' => $displayName,
                'phoneNumber' => $phoneNumber,
                'language' => $language,
                'verificationMethod' => $verificationMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->initializeVerification($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
