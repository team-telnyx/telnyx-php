<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\VoiceContract;

final class VoiceService implements VoiceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new CDR report request with the specified filters
     *
     * @param array{
     *   end_time: string|\DateTimeInterface,
     *   start_time: string|\DateTimeInterface,
     *   call_types?: list<int>,
     *   connections?: list<int>,
     *   fields?: list<string>,
     *   filters?: list<array{
     *     billing_group?: string,
     *     cld?: string,
     *     cld_filter?: 'contains'|'starts_with'|'ends_with',
     *     cli?: string,
     *     cli_filter?: 'contains'|'starts_with'|'ends_with',
     *     filter_type?: 'and'|'or',
     *     tags_list?: string,
     *   }|Filter>,
     *   include_all_metadata?: bool,
     *   managed_accounts?: list<string>,
     *   record_types?: list<int>,
     *   report_name?: string,
     *   select_all_managed_accounts?: bool,
     *   source?: string,
     *   timezone?: string,
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

        /** @var BaseResponse<VoiceNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/voice',
            body: (object) $parsed,
            options: $options,
            convert: VoiceNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a specific CDR report request by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        /** @var BaseResponse<VoiceGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all CDR report requests for the authenticated user
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse {
        /** @var BaseResponse<VoiceListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/voice',
            options: $requestOptions,
            convert: VoiceListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a specific CDR report request by ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse {
        /** @var BaseResponse<VoiceDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceDeleteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all available fields that can be used in CDR reports
     *
     * @throws APIException
     */
    public function retrieveFields(
        ?RequestOptions $requestOptions = null
    ): VoiceGetFieldsResponse {
        /** @var BaseResponse<VoiceGetFieldsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/voice/fields',
            options: $requestOptions,
            convert: VoiceGetFieldsResponse::class,
        );

        return $response->parse();
    }
}
