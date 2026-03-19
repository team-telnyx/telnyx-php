<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\BusinessAccounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberCreateVerificationParams;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberListParams;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $id Whatsapp Business Account ID
     * @param array<string,mixed>|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|PhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Whatsapp Business Account ID
     * @param array<string,mixed>|PhoneNumberCreateVerificationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createVerification(
        string $id,
        array|PhoneNumberCreateVerificationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
