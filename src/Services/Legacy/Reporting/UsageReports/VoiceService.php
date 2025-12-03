<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Voice\CdrUsageReportResponseLegacy;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceListParams;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\VoiceContract;

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
     * @param array{
     *   end_time: string|\DateTimeInterface,
     *   start_time: string|\DateTimeInterface,
     *   aggregation_type?: int,
     *   connections?: list<int>,
     *   managed_accounts?: list<string>,
     *   product_breakdown?: int,
     *   select_all_managed_accounts?: bool,
     * }|VoiceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VoiceCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): VoiceNewResponse {
        [$parsed, $options] = VoiceCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
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
     * @param array{page?: int, per_page?: int}|VoiceListParams $params
     *
     * @return PerPagePagination<CdrUsageReportResponseLegacy>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): PerPagePagination {
        [$parsed, $options] = VoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/voice',
            query: $parsed,
            options: $options,
            convert: CdrUsageReportResponseLegacy::class,
            page: PerPagePagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific V2 legacy usage CDR report request by ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
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
