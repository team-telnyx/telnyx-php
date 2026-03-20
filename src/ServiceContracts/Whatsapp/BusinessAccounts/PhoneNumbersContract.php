<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\BusinessAccounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberInitializeVerificationParams\VerificationMethod;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersContract
{
    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): mixed;
}
