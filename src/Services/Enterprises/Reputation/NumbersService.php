<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\NumbersContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumbersService implements NumbersContract
{
    /**
     * @api
     */
    public NumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumbersRawService($client);
    }

    /**
     * @api
     *
     * Retrieve one registered number with its latest reputation snapshot. The `phone_number` path parameter is in E.164 format and must be URL-encoded (e.g. `%2B19493253498`).
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param string $enterpriseID Path param: The enterprise id. Lowercase UUID.
     * @param bool $fresh Query param: When true, fetches fresh reputation data (incurs API cost). When false (default), returns cached data.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        string $enterpriseID,
        bool $fresh = false,
        RequestOptions|array|null $requestOptions = null,
    ): NumberGetResponse {
        $params = Util::removeNulls(
            ['enterpriseID' => $enterpriseID, 'fresh' => $fresh]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Paginated list of phone numbers registered for reputation monitoring under this enterprise. The response includes the latest reputation snapshot per number where one has been collected.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $filterPhoneNumberContains Partial match on phone number. Must contain at least 5 digits.
     * @param string $filterPhoneNumberEq Exact phone-number match (E.164).
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Default 10. Maximum 250; values above are clamped to 250.
     * @param string $phoneNumber Filter by specific phone number (E.164 format).
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        int $pageNumber = 1,
        int $pageSize = 10,
        ?string $phoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterPhoneNumberContains' => $filterPhoneNumberContains,
                'filterPhoneNumberEq' => $filterPhoneNumberEq,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'phoneNumber' => $phoneNumber,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add up to 100 phone numbers to reputation monitoring on this enterprise. Each must be in E.164 format (`+1NPANXXXXXX` for US/CA) and belong to your Telnyx phone-number inventory.
     *
     * **Prerequisite**: reputation must already be enabled on this enterprise (see `POST .../reputation`).
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param list<string> $phoneNumbers 1–100 phone numbers in E.164 format with a leading `+`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function associate(
        string $enterpriseID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): NumberAssociateResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->associate($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stop tracking the reputation of this phone number. The number itself remains in your inventory; only the reputation registration is removed.
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disassociate(
        string $phoneNumber,
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['enterpriseID' => $enterpriseID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disassociate($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Immediately refresh the stored reputation data for the listed numbers. This is in addition to the periodic refresh determined by `check_frequency`. Up to 100 numbers per call. The response carries the kicked-off jobs; the actual refresh runs asynchronously.
     *
     * **Pricing:** Forcing a refresh performs live reputation lookups, which are billable. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param list<string> $phoneNumbers Phone numbers to refresh reputation data for. 1–100 numbers per request, each in E.164 format. Reputation refreshes are subject to per-enterprise rate limits.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refresh(
        string $enterpriseID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): NumberRefreshResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refresh($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
