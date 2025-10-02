<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams\Page;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MdrUsageReportsContract
{
    /**
     * @api
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     * @param string $profiles
     *
     * @return MdrUsageReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $aggregationType,
        $endDate,
        $startDate,
        $profiles = omit,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MdrUsageReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportNewResponse;

    /**
     * @api
     *
     * @return MdrUsageReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse;

    /**
     * @api
     *
     * @return MdrUsageReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return MdrUsageReportListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MdrUsageReportListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse;

    /**
     * @api
     *
     * @return MdrUsageReportDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse;

    /**
     * @api
     *
     * @return MdrUsageReportDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse;

    /**
     * @api
     *
     * @param Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType|value-of<Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType> $aggregationType
     * @param \DateTimeInterface $endDate
     * @param list<string> $profiles
     * @param \DateTimeInterface $startDate
     *
     * @return MdrUsageReportFetchSyncResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function fetchSync(
        $aggregationType,
        $endDate = omit,
        $profiles = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MdrUsageReportFetchSyncResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function fetchSyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportFetchSyncResponse;
}
