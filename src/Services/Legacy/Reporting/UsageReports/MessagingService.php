<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MdrUsageReportResponseLegacy;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\MessagingContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingService implements MessagingContract
{
    /**
     * @api
     */
    public MessagingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingRawService($client);
    }

    /**
     * @api
     *
     * Creates a new legacy usage V2 MDR report request with the specified filters
     *
     * @param int $aggregationType Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<string> $profiles List of messaging profile IDs to filter by
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $aggregationType,
        ?\DateTimeInterface $endTime = null,
        ?array $managedAccounts = null,
        ?array $profiles = null,
        ?bool $selectAllManagedAccounts = null,
        ?\DateTimeInterface $startTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingNewResponse {
        $params = Util::removeNulls(
            [
                'aggregationType' => $aggregationType,
                'endTime' => $endTime,
                'managedAccounts' => $managedAccounts,
                'profiles' => $profiles,
                'selectAllManagedAccounts' => $selectAllManagedAccounts,
                'startTime' => $startTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch single MDR usage report by id.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch all previous requests for MDR usage reports.
     *
     * @param int $page Page number
     * @param int $perPage Size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return PerPagePagination<MdrUsageReportResponseLegacy>
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
     * Deletes a specific V2 legacy usage MDR report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
