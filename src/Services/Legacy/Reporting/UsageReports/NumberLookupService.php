<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\NumberLookupContract;

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
     * @param array{
     *   aggregationType?: 'ALL'|'BY_ORGANIZATION_MEMBER',
     *   endDate?: string|\DateTimeInterface,
     *   managedAccounts?: list<string>,
     *   startDate?: string|\DateTimeInterface,
     * }|NumberLookupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberLookupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = NumberLookupCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{page?: int, per_page?: int}|NumberLookupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberLookupListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = NumberLookupListParams::parseRequest(
            $params,
            $requestOptions,
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/number_lookup/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
