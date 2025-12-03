<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListParams;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\MessagingContract;

final class MessagingService implements MessagingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new legacy usage V2 MDR report request with the specified filters
     *
     * @param array{
     *   aggregation_type: int,
     *   end_time?: string|\DateTimeInterface,
     *   managed_accounts?: list<string>,
     *   profiles?: list<string>,
     *   select_all_managed_accounts?: bool,
     *   start_time?: string|\DateTimeInterface,
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/usage_reports/messaging',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: MessagingNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch single MDR usage report by id.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch all previous requests for MDR usage reports.
     *
     * @param array{page?: int, per_page?: int}|MessagingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        [$parsed, $options] = MessagingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/messaging',
            query: $parsed,
            options: $options,
            convert: MessagingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific V2 legacy usage MDR report request by ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );
    }
}
