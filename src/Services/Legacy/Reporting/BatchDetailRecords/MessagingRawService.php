<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\MessagingRawContract;

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
     *   endTime: string|\DateTimeInterface,
     *   startTime: string|\DateTimeInterface,
     *   connections?: list<int>,
     *   directions?: list<int>,
     *   filters?: list<array{
     *     billingGroup?: string,
     *     cld?: string,
     *     cldFilter?: 'contains'|'starts_with'|'ends_with'|CldFilter,
     *     cli?: string,
     *     cliFilter?: 'contains'|'starts_with'|'ends_with'|CliFilter,
     *     filterType?: 'and'|'or'|FilterType,
     *     tagsList?: string,
     *   }|Filter>,
     *   includeMessageBody?: bool,
     *   managedAccounts?: list<string>,
     *   profiles?: list<string>,
     *   recordTypes?: list<int>,
     *   reportName?: string,
     *   selectAllManagedAccounts?: bool,
     *   timezone?: string,
     * }|MessagingCreateParams $params
     *
     * @return BaseResponse<MessagingNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        ?RequestOptions $requestOptions = null
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
     * @return BaseResponse<MessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @return BaseResponse<MessagingListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
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
     * @return BaseResponse<MessagingDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
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
