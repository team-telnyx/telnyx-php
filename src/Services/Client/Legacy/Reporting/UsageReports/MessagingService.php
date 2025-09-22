<?php

declare(strict_types=1);

namespace Telnyx\Services\Client\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Client\Legacy\Reporting\UsageReports\Messaging\MessagingDeleteResponse;
use Telnyx\Client\Legacy\Reporting\UsageReports\Messaging\MessagingGetResponse;
use Telnyx\Client\Legacy\Reporting\UsageReports\Messaging\MessagingListResponse;
use Telnyx\Client\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Client\Legacy\Reporting\UsageReports\MessagingContract;

use const Telnyx\Core\OMIT as omit;

final class MessagingService implements MessagingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new legacy usage V2 MDR report request with the specified filters
     *
     * @param int $aggregationType Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2
     * @param \DateTimeInterface $endTime
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<string> $profiles List of messaging profile IDs to filter by
     * @param bool $selectAllManagedAccounts
     * @param \DateTimeInterface $startTime
     *
     * @return MessagingNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $aggregationType,
        $endTime = omit,
        $managedAccounts = omit,
        $profiles = omit,
        $selectAllManagedAccounts = omit,
        $startTime = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingNewResponse {
        $params = [
            'aggregationType' => $aggregationType,
            'endTime' => $endTime,
            'managedAccounts' => $managedAccounts,
            'profiles' => $profiles,
            'selectAllManagedAccounts' => $selectAllManagedAccounts,
            'startTime' => $startTime,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessagingNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingNewResponse {
        [$parsed, $options] = MessagingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/usage_reports/messaging',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: MessagingNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch single MDR usage report by id.
     *
     * @return MessagingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessagingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch all previous requests for MDR usage reports.
     *
     * @param int $page Page number
     * @param int $perPage Size of the page
     *
     * @return MessagingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        $perPage = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        $params = ['page' => $page, 'perPage' => $perPage];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessagingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        [$parsed, $options] = MessagingListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/messaging',
            query: $parsed,
            options: $options,
            convert: MessagingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific V2 legacy usage MDR report request by ID
     *
     * @return MessagingDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessagingDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );
    }
}
