<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\NumberLookupContract;

final class NumberLookupService implements NumberLookupContract
{
    /**
     * @api
     */
    public NumberLookupRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberLookupRawService($client);
    }

    /**
     * @api
     *
     * Submit a new telco data usage report
     *
     * @param 'ALL'|'BY_ORGANIZATION_MEMBER'|AggregationType $aggregationType Type of aggregation for the report
     * @param string|\DateTimeInterface $endDate End date for the usage report
     * @param list<string> $managedAccounts List of managed accounts to include in the report
     * @param string|\DateTimeInterface $startDate Start date for the usage report
     *
     * @throws APIException
     */
    public function create(
        string|AggregationType|null $aggregationType = null,
        string|\DateTimeInterface|null $endDate = null,
        ?array $managedAccounts = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupNewResponse {
        $params = [
            'aggregationType' => $aggregationType,
            'endDate' => $endDate,
            'managedAccounts' => $managedAccounts,
            'startDate' => $startDate,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific telco data usage report by its ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NumberLookupGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of telco data usage reports
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): NumberLookupListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific telco data usage report by its ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
