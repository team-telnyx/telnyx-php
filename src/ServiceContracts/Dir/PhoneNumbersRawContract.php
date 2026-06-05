<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListParams;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveParams;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        array|PhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|PhoneNumberAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $dirID,
        array|PhoneNumberAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|PhoneNumberRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $dirID,
        array|PhoneNumberRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
