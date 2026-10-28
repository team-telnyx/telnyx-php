<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpendLimitsRawContract;
use Telnyx\SpendLimits\SpendLimitCreateParams;
use Telnyx\SpendLimits\SpendLimitDeleteParams;
use Telnyx\SpendLimits\SpendLimitListResponse;
use Telnyx\SpendLimits\SpendLimitPeriod;
use Telnyx\SpendLimits\SpendLimitResponse;
use Telnyx\SpendLimits\SpendLimitUpdateParams;

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
final class SpendLimitsRawService implements SpendLimitsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Sets a limit for a product and period that has none. Send exactly one of `amount` and `unlimited: true`. The period's spend is checked at once: if it is already above the new limit, the product is blocked immediately (`evaluation.blocked_now`). Returns 409 when a limit already exists for the product and period; update it instead. With `credential_id`, the limit applies to that API key only: it needs an `amount`, and the period's API key limits cannot add up to more than the total limit when the total has an amount.
     *
     * @param array{
     *   amount: float,
     *   product: string,
     *   credentialID?: string|null,
     *   period?: SpendLimitPeriod|value-of<SpendLimitPeriod>,
     *   reason?: string,
     *   unlimited: bool,
     * }|SpendLimitCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendLimitResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SpendLimitCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendLimitCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'spend_limits',
            body: (object) $parsed,
            options: $options,
            convert: SpendLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Replaces the value of the existing limit for the product and period. Send exactly one of `amount` and `unlimited: true`. The period's spend is checked at once: raising the limit above the spend lifts the period's block (`evaluation.released`), and lowering it below the spend blocks the product (`evaluation.blocked_now`). Returns 404 when no limit is set; create it instead. With the `credential_id` query parameter, the request changes that API key's limit; it needs an `amount`, and it can be at most the period's total limit. Lowering the total limit below the period's highest API key limit is refused.
     *
     * @param string $product path param: Product the limit applies to, as returned in `product` by the list operation
     * @param array{
     *   amount: float,
     *   credentialID?: string,
     *   period?: SpendLimitPeriod|value-of<SpendLimitPeriod>,
     *   reason?: string,
     *   unlimited: bool,
     * }|SpendLimitUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SpendLimitUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['credentialID', 'period']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['spend_limits/%1$s', $product],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['credentialID' => 'credential_id'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SpendLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns one entry per product and period you can set a limit on, with the limit, the spend so far in the period and whether the product is blocked. An entry without a limit is still listed (`limit: null`). When the spend cannot be read, the entry is returned with `spend_usd: null` and `spend_error` set. The list is not paginated. Each entry also lists the API key limits of its product and period in `credential_limits`, with each key's spend and block. Each API key limit can be at most the total limit; together they may add up to more than it.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendLimitListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'spend_limits',
            options: $requestOptions,
            convert: SpendLimitListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes the limit for the product and period. For `inference`, which has no default limit, the product becomes unlimited for the period and the period's block is lifted (`evaluation.released`). The response carries `limit: null` and the `effective_limit_usd` that applies after the removal. Returns 404 when no limit is set. With the `credential_id` query parameter, the request removes that API key's limit for the period and lifts the key's block in that period at once. A block under the key's limit in the other period stays (`evaluation.still_blocked_other_period`). Removing the total limit leaves the API key limits in place.
     *
     * @param string $product product the limit applies to, as returned in `product` by the list operation
     * @param array{
     *   credentialID?: string,
     *   period?: SpendLimitPeriod|value-of<SpendLimitPeriod>,
     *   reason?: string,
     * }|SpendLimitDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SpendLimitDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['spend_limits/%1$s', $product],
            query: Util::array_transform_keys(
                $parsed,
                ['credentialID' => 'credential_id']
            ),
            options: $options,
            convert: SpendLimitResponse::class,
        );
    }
}
