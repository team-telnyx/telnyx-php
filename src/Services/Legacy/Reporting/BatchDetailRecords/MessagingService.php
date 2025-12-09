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

        /** @var BaseResponse<MessagingNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/messaging',
            body: (object) $parsed,
            options: $options,
            convert: MessagingNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/messaging',
            options: $requestOptions,
            convert: MessagingListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );

        return $response->parse();
    }
}
