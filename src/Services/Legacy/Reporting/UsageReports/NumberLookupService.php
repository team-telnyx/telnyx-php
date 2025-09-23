<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\NumberLookupContract;

use const Telnyx\Core\OMIT as omit;

final class NumberLookupService implements NumberLookupContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit a new telco data usage report
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType Type of aggregation for the report
     * @param \DateTimeInterface $endDate End date for the usage report
     * @param list<string> $managedAccounts List of managed accounts to include in the report
     * @param \DateTimeInterface $startDate Start date for the usage report
     *
     * @throws APIException
     */
    public function create(
        $aggregationType = omit,
        $endDate = omit,
        $managedAccounts = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'aggregationType' => $aggregationType,
            'endDate' => $endDate,
            'managedAccounts' => $managedAccounts,
            'startDate' => $startDate,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = NumberLookupCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/usage_reports/number_lookup',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
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
    ): mixed {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/number_lookup/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of telco data usage reports
     *
     * @param int $page
     * @param int $perPage
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        $perPage = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['page' => $page, 'perPage' => $perPage];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = NumberLookupListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/number_lookup',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/number_lookup/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
