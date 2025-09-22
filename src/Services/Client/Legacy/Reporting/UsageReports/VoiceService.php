<?php

declare(strict_types=1);

namespace Telnyx\Services\Client\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Client\Legacy\Reporting\UsageReports\Voice\VoiceDeleteResponse;
use Telnyx\Client\Legacy\Reporting\UsageReports\Voice\VoiceGetResponse;
use Telnyx\Client\Legacy\Reporting\UsageReports\Voice\VoiceListResponse;
use Telnyx\Client\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceListParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Client\Legacy\Reporting\UsageReports\VoiceContract;

use const Telnyx\Core\OMIT as omit;

final class VoiceService implements VoiceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *
     * @return VoiceNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $endTime,
        $startTime,
        $aggregationType = omit,
        $connections = omit,
        $managedAccounts = omit,
        $productBreakdown = omit,
        $selectAllManagedAccounts = omit,
        ?RequestOptions $requestOptions = null,
    ): VoiceNewResponse {
        $params = [
            'endTime' => $endTime,
            'startTime' => $startTime,
            'aggregationType' => $aggregationType,
            'connections' => $connections,
            'managedAccounts' => $managedAccounts,
            'productBreakdown' => $productBreakdown,
            'selectAllManagedAccounts' => $selectAllManagedAccounts,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VoiceNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VoiceNewResponse {
        [$parsed, $options] = VoiceCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/usage_reports/voice',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: VoiceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch single cdr usage report by id.
     *
     * @return VoiceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VoiceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch all previous requests for cdr usage reports.
     *
     * @param int $page Page number
     * @param int $perPage Size of the page
     *
     * @return VoiceListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        $perPage = omit,
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse {
        $params = ['page' => $page, 'perPage' => $perPage];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VoiceListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse {
        [$parsed, $options] = VoiceListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/voice',
            query: $parsed,
            options: $options,
            convert: VoiceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific V2 legacy usage CDR report request by ID
     *
     * @return VoiceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VoiceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceDeleteResponse::class,
        );
    }
}
