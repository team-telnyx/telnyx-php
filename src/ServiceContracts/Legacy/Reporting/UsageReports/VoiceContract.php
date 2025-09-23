<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface VoiceContract
{
    /**
     * @api
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
    ): VoiceNewResponse;

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
    ): VoiceNewResponse;

    /**
     * @api
     *
     * @return VoiceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse;

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
    ): VoiceGetResponse;

    /**
     * @api
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
    ): VoiceListResponse;

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
    ): VoiceListResponse;

    /**
     * @api
     *
     * @return VoiceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse;

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
    ): VoiceDeleteResponse;
}
