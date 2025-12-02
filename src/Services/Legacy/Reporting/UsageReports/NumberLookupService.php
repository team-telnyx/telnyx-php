<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse;
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
    ): NumberLookupNewResponse {
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
            convert: NumberLookupNewResponse::class,
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
    ): NumberLookupGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/number_lookup/%1$s', $id],
            options: $requestOptions,
            convert: NumberLookupGetResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/number_lookup',
            options: $requestOptions,
            convert: NumberLookupListResponse::class,
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
