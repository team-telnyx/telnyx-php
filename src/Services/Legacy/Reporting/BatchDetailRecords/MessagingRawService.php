<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\MessagingRawContract;

/**
 * Messaging batch detail records.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingRawService implements MessagingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new MDR detailed report request with the specified filters
     *
     * @param array{
     *   endTime: \DateTimeInterface,
     *   startTime: \DateTimeInterface,
     *   connections?: list<int>,
     *   directions?: list<int>,
     *   filters?: list<Filter|FilterShape>,
     *   includeMessageBody?: bool,
     *   managedAccounts?: list<string>,
     *   profiles?: list<string>,
     *   recordTypes?: list<int>,
     *   reportName?: string,
     *   selectAllManagedAccounts?: bool,
     *   timezone?: string,
     * }|MessagingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/messaging',
            body: (object) $parsed,
            options: $options,
            convert: MessagingNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a specific MDR detailed report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingGetResponse>
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
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all MDR detailed report requests for the authenticated user
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/messaging',
            options: $requestOptions,
            convert: MessagingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific MDR detailed report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingDeleteResponse>
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
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );
    }
}
