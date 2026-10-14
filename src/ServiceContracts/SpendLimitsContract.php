<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpendLimits\SpendLimitListResponse;
use Telnyx\SpendLimits\SpendLimitPeriod;
use Telnyx\SpendLimits\SpendLimitResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpendLimitsContract
{
    /**
     * @api
     *
     * @param float $amount Limit in USD. `0` blocks at the first cent of spend.
     * @param string $product product to limit, as returned in `product` by the list operation
     * @param bool $unlimited `true`: explicitly no cap
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod> $period `daily` is the current UTC day; `monthly` is the current UTC calendar month
     * @param string $reason why the limit is set or changed, kept for audit
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        float $amount,
        string $product,
        bool $unlimited,
        SpendLimitPeriod|string $period = 'daily',
        ?string $reason = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpendLimitResponse;

    /**
     * @api
     *
     * @param string $product path param: Product the limit applies to, as returned in `product` by the list operation
     * @param float $amount Body param: Limit in USD. `0` blocks at the first cent of spend.
     * @param bool $unlimited body param: `true`: explicitly no cap
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod> $period Query param: Limit period. Defaults to `daily`; send it explicitly.
     * @param string $reason body param: Why the limit is set or changed, kept for audit
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $product,
        float $amount,
        bool $unlimited,
        SpendLimitPeriod|string $period = 'daily',
        ?string $reason = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpendLimitResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SpendLimitListResponse;

    /**
     * @api
     *
     * @param string $product product the limit applies to, as returned in `product` by the list operation
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod> $period Limit period. Defaults to `daily`; send it explicitly.
     * @param string $reason Why the limit is removed, kept for audit. At most 500 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $product,
        SpendLimitPeriod|string $period = 'daily',
        ?string $reason = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpendLimitResponse;
}
