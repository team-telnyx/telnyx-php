<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeCreateParams;
use Telnyx\AccessIPRanges\AccessIPRangeListParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AccessIPRangesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AccessIPRangeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessIPRange>
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPRangeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AccessIPRangeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AccessIPRange>>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPRangeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessIPRange>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPRangeID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
