<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpendLimits\SpendLimitCreateParams;
use Telnyx\SpendLimits\SpendLimitDeleteParams;
use Telnyx\SpendLimits\SpendLimitListResponse;
use Telnyx\SpendLimits\SpendLimitResponse;
use Telnyx\SpendLimits\SpendLimitUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpendLimitsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SpendLimitCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendLimitResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SpendLimitCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $product path param: Product the limit applies to, as returned in `product` by the list operation
     * @param array<string,mixed>|SpendLimitUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendLimitResponse>
     *
     * @throws APIException
     */
    public function update(
        string $product,
        array|SpendLimitUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendLimitListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $product product the limit applies to, as returned in `product` by the list operation
     * @param array<string,mixed>|SpendLimitDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendLimitResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $product,
        array|SpendLimitDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
