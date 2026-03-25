<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersContract
{
    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param list<string> $phoneNumbers List of phone numbers to associate for reputation monitoring (max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): NumberNewResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format
     * @param string $enterpriseID Path param: Unique identifier of the enterprise (UUID)
     * @param bool $fresh Query param: When true, fetches fresh reputation data (incurs API cost). When false, returns cached data.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        string $enterpriseID,
        bool $fresh = false,
        RequestOptions|array|null $requestOptions = null,
    ): NumberGetResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
        string $enterpriseID,
        int $pageNumber = 1,
        int $pageSize = 10,
        ?string $phoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
