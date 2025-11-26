<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\MessagingContract;

final class MessagingService implements MessagingContract
{
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
     *   end_time: string|\DateTimeInterface,
     *   start_time: string|\DateTimeInterface,
     *   connections?: list<int>,
     *   directions?: list<int>,
     *   filters?: list<array{
     *     billing_group?: string,
     *     cld?: string,
     *     cld_filter?: 'contains'|'starts_with'|'ends_with',
     *     cli?: string,
     *     cli_filter?: 'contains'|'starts_with'|'ends_with',
     *     filter_type?: 'and'|'or',
     *     tags_list?: string,
     *   }|Filter>,
     *   include_message_body?: bool,
     *   managed_accounts?: list<string>,
     *   profiles?: list<string>,
     *   record_types?: list<int>,
     *   report_name?: string,
     *   select_all_managed_accounts?: bool,
     *   timezone?: string,
     * }|MessagingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): MessagingNewResponse {
        [$parsed, $options] = MessagingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );
    }
}
