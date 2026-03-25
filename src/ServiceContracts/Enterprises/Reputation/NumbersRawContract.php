<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberCreateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberDeleteParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberListResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberNewResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array<string,mixed>|NumberCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|NumberCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format
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
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array<string,mixed>|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|NumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param array<string,mixed>|NumberDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        array|NumberDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
