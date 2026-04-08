<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reputation\Numbers\NumberGetResponse;
use Telnyx\Reputation\Numbers\NumberListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param bool $fresh When true, fetches fresh reputation data (incurs API cost). When false, returns cached data.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        bool $fresh = false,
        RequestOptions|array|null $requestOptions = null,
    ): NumberGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number (1-indexed)
     * @param int $pageSize Number of items per page
     * @param string $phoneNumber Filter by specific phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 10,
        ?string $phoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
