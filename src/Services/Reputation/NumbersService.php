<?php

declare(strict_types=1);

namespace Telnyx\Services\Reputation;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reputation\Numbers\NumberGetResponse;
use Telnyx\ReputationPhoneNumberWithReputationData;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reputation\NumbersContract;

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
     * Get reputation data for a specific phone number without requiring an `enterprise_id`.
     *
     * Same response as the enterprise-scoped endpoint. Uses cached data by default.
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
    ): NumberGetResponse {
        $params = Util::removeNulls(['fresh' => $fresh]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all phone numbers enrolled in Number Reputation monitoring for your account. This is a simplified endpoint that does not require an `enterprise_id` — it returns numbers across all your enterprises.
     *
     * Supports pagination and filtering by phone number.
     *
     * @param int $pageNumber Page number (1-indexed)
     * @param int $pageSize Number of items per page
     * @param string $phoneNumber Filter by specific phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ReputationPhoneNumberWithReputationData>
     *
     * @throws APIException
     */
    public function list(
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
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove a phone number from Number Reputation monitoring without requiring an `enterprise_id`.
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }
}
