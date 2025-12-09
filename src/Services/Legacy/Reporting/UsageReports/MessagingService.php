<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
     *   aggregationType: int,
     *   endTime?: string|\DateTimeInterface,
     *   managedAccounts?: list<string>,
     *   profiles?: list<string>,
     *   selectAllManagedAccounts?: bool,
     *   startTime?: string|\DateTimeInterface,
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
            path: 'legacy/reporting/usage_reports/messaging',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: MessagingNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch all previous requests for MDR usage reports.
     *
     * @param array{page?: int, perPage?: int}|MessagingListParams $params
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

        /** @var BaseResponse<MessagingListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/messaging',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: MessagingListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );

        return $response->parse();
    }
}
