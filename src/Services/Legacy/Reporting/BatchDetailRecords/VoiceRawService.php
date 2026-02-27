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
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\VoiceRawContract;

/**
 * Voice batch detail records.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceRawService implements VoiceRawContract
{
    // @phpstan-ignore-next-line
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
     *   endTime: \DateTimeInterface,
     *   startTime: \DateTimeInterface,
     *   callTypes?: list<int>,
     *   connections?: list<int>,
     *   fields?: list<string>,
     *   filters?: list<Filter|FilterShape>,
     *   includeAllMetadata?: bool,
     *   managedAccounts?: list<string>,
     *   recordTypes?: list<int>,
     *   reportName?: string,
     *   selectAllManagedAccounts?: bool,
     *   source?: string,
     *   timezone?: string,
     * }|VoiceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VoiceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VoiceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/voice',
            body: (object) $parsed,
            options: $options,
            convert: VoiceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a specific CDR report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all CDR report requests for the authenticated user
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/voice',
            options: $requestOptions,
            convert: VoiceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific CDR report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all available fields that can be used in CDR reports
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VoiceGetFieldsResponse>
     *
     * @throws APIException
     */
    public function retrieveFields(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/voice/fields',
            options: $requestOptions,
            convert: VoiceGetFieldsResponse::class,
        );
    }
}
