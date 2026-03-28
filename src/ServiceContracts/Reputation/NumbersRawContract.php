<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reputation\Numbers\NumberGetResponse;
use Telnyx\Reputation\Numbers\NumberListParams;
use Telnyx\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\ReputationPhoneNumberWithReputationData;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param array<string,mixed>|NumberRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReputationPhoneNumberWithReputationData,>,>
     *
     * @throws APIException
     */
    public function list(
        array|NumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
