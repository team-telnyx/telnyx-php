<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpendLimitsContract;
use Telnyx\SpendLimits\SpendLimitListResponse;
use Telnyx\SpendLimits\SpendLimitPeriod;
use Telnyx\SpendLimits\SpendLimitResponse;

/**
 * Daily and monthly spend limits per product. A limit applies to the organization of the authenticated user, or to the user's own account when they belong to no organization; every user of the organization sees and changes the same limits.
 *
 * - **Periods.** `daily` covers the current UTC day and `monthly` the current UTC calendar month. The two limits are independent: you can set either, both or neither.
 * - **Blocking.** When spend in a period goes above the limit (strictly greater), the product is blocked until the period ends: 00:00 UTC the next day for `daily`, 00:00 UTC on the 1st of the next month for `monthly`. A block appears within about 2 minutes (daily) or 10 minutes (monthly) of the spend being recorded.
 * - **Changes apply immediately.** Creating, updating or deleting a limit checks the period's spend in the same request: raising the limit above the spend, or removing it, lifts that period's block, and lowering it below the spend blocks the product at once. The `evaluation` object in the response says what happened.
 * - **Supported products.** Today only `inference` supports spend limits. A blocked account gets HTTP 403 with the error title `Inference spend limit reached` (code `10039`) on new billable chat completions, Responses, Anthropic Messages and classification requests; requests already running finish normally. Take the list of products from the list operation.
 * - **API key limits.** For `inference`, a limit can also apply to one API key, named by `credential_id`: the key's identifier as recorded on usage, never its secret. When the key's spend goes above its own limit, only that key is blocked, with the error title `API key spend limit reached` (code `10039`); the account's other keys keep working. The API key limits of a period cannot add up to more than the total limit when the total has an amount. Only language-model requests authenticated with an API key count toward its limit.
 * - **Limits set by Telnyx.** Telnyx support can also set a limit on your account. It is listed with `origin: operator` and you can update or delete it like your own.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpendLimitsService implements SpendLimitsContract
{
    /**
     * @api
     */
    public SpendLimitsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpendLimitsRawService($client);
    }

    /**
     * @api
     *
     * Sets a limit for a product and period that has none. Send exactly one of `amount` and `unlimited: true`. The period's spend is checked at once: if it is already above the new limit, the product is blocked immediately (`evaluation.blocked_now`). Returns 409 when a limit already exists for the product and period; update it instead. With `credential_id`, the limit applies to that API key only: it needs an `amount`, and the period's API key limits cannot add up to more than the total limit when the total has an amount.
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
    ): SpendLimitResponse {
        $params = array_filter(
            [
                'amount' => $amount,
                'product' => $product,
                'credentialID' => $credentialID,
                'period' => $period,
                'reason' => $reason ?? Omitted::VALUE,
                'unlimited' => $unlimited,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces the value of the existing limit for the product and period. Send exactly one of `amount` and `unlimited: true`. The period's spend is checked at once: raising the limit above the spend lifts the period's block (`evaluation.released`), and lowering it below the spend blocks the product (`evaluation.blocked_now`). Returns 404 when no limit is set; create it instead. With the `credential_id` query parameter, the request changes that API key's limit; it needs an `amount`, and it can be at most the period's total limit. Lowering the total limit below the period's highest API key limit is refused.
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
    ): SpendLimitResponse {
        $params = array_filter(
            [
                'amount' => $amount,
                'credentialID' => $credentialID ?? Omitted::VALUE,
                'period' => $period,
                'reason' => $reason ?? Omitted::VALUE,
                'unlimited' => $unlimited,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($product, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns one entry per product and period you can set a limit on, with the limit, the spend so far in the period and whether the product is blocked. An entry without a limit is still listed (`limit: null`). When the spend cannot be read, the entry is returned with `spend_usd: null` and `spend_error` set. The list is not paginated. Each entry also lists the API key limits of its product and period in `credential_limits`, with each key's spend and block. Each API key limit can be at most the total limit; together they may add up to more than it.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SpendLimitListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes the limit for the product and period. For `inference`, which has no default limit, the product becomes unlimited for the period and the period's block is lifted (`evaluation.released`). The response carries `limit: null` and the `effective_limit_usd` that applies after the removal. Returns 404 when no limit is set. With the `credential_id` query parameter, the request removes that API key's limit for the period and lifts the key's block in that period at once. A block under the key's limit in the other period stays (`evaluation.still_blocked_other_period`). Removing the total limit leaves the API key limits in place.
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
    ): SpendLimitResponse {
        $params = array_filter(
            [
                'credentialID' => $credentialID ?? Omitted::VALUE,
                'period' => $period,
                'reason' => $reason ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($product, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
