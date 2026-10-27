<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
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
     * @param string|Omitted|null $credentialID Optional. Identifier of one API key as recorded on usage, never the key's secret: the limit then applies to that key only. Absent or `null` sets the total limit. A blank value, or one with control characters, is refused; it never means the total limit. An API key limit always has an `amount`.
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
        string|Omitted|null $credentialID = Omitted::VALUE,
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
     * @param string $credentialID Query param: Identifier of one API key as recorded on usage, never the key's secret, percent-encoded: the request is then about that key's limit. Absent means the total limit; present but blank is refused.
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
        ?string $credentialID = null,
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
     * @param string $credentialID Identifier of one API key as recorded on usage, never the key's secret, percent-encoded: the request is then about that key's limit. Absent means the total limit; present but blank is refused.
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod> $period Limit period. Defaults to `daily`; send it explicitly.
     * @param string $reason Why the limit is removed, kept for audit. At most 500 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $product,
        ?string $credentialID = null,
        SpendLimitPeriod|string $period = 'daily',
        ?string $reason = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpendLimitResponse;
}
