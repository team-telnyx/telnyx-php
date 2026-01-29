<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\UsageReports\Voice\CdrUsageReportResponseLegacy;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\VoiceContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceService implements VoiceContract
{
    /**
     * @api
     */
    public VoiceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceRawService($client);
    }

    /**
     * @api
     *
     * Creates a new legacy usage V2 CDR report request with the specified filters
     *
     * @param \DateTimeInterface $endTime End time in ISO format
     * @param \DateTimeInterface $startTime Start time in ISO format
     * @param int $aggregationType Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3
     * @param list<int> $connections List of connections to filter by
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param int $productBreakdown Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime,
        ?int $aggregationType = null,
        ?array $connections = null,
        ?array $managedAccounts = null,
        ?int $productBreakdown = null,
        ?bool $selectAllManagedAccounts = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceNewResponse {
        $params = Util::removeNulls(
            [
                'endTime' => $endTime,
                'startTime' => $startTime,
                'aggregationType' => $aggregationType,
                'connections' => $connections,
                'managedAccounts' => $managedAccounts,
                'productBreakdown' => $productBreakdown,
                'selectAllManagedAccounts' => $selectAllManagedAccounts,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch single cdr usage report by id.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VoiceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch all previous requests for cdr usage reports.
     *
     * @param int $page Page number
     * @param int $perPage Size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return PerPagePagination<CdrUsageReportResponseLegacy>
     *
     * @throws APIException
     */
    public function list(
        int $page = 1,
        int $perPage = 20,
        RequestOptions|array|null $requestOptions = null,
    ): PerPagePagination {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a specific V2 legacy usage CDR report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VoiceDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
