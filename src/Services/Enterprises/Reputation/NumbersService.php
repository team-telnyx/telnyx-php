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
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\NumbersContract;

/**
 * Associate phone numbers with an enterprise for reputation monitoring and retrieve reputation scores.
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
     * Get detailed reputation data for a specific phone number associated with an enterprise.
     *
     * **Query Parameters:**
     * - `fresh` (default: `false`): When `true`, fetches fresh reputation data (incurs API cost). When `false`, returns cached data. If no cached data exists, fresh data is automatically fetched.
     *
     * **Returns:**
     * - `spam_risk`: Overall spam risk level (`low`, `medium`, `high`)
     * - `spam_category`: Spam category classification
     * - `maturity_score`: Maturity metric (0–100)
     * - `connection_score`: Connection quality metric (0–100)
     * - `engagement_score`: Engagement metric (0–100)
     * - `sentiment_score`: Sentiment metric (0–100)
     * - `last_refreshed_at`: Timestamp of last data refresh
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
     * List all phone numbers associated with an enterprise for Number Reputation monitoring.
     *
     * Returns phone numbers with their cached reputation data (if available). Supports pagination and filtering by phone number.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
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
     * Associate one or more phone numbers with an enterprise for Number Reputation monitoring.
     *
     * **Validations:**
     * - Phone numbers must be in E.164 format (e.g., `+16035551234`)
     * - Phone numbers must be in-service and belong to your account (verified via Warehouse)
     * - Phone numbers must be US local numbers
     * - Phone numbers cannot already be associated with any enterprise
     *
     * **Note:** This operation is atomic — if any number fails validation, the entire request fails.
     *
     * **Maximum:** 100 phone numbers per request.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param list<string> $phoneNumbers List of phone numbers to associate for reputation monitoring (max 100)
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
     * Remove a phone number from Number Reputation monitoring for an enterprise.
     *
     * The number will no longer be tracked and reputation data will no longer be refreshed.
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
}
