<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams;
use Telnyx\ExternalConnections\Uploads\UploadListResponse;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetrieveParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\UploadsContract;

final class UploadsService implements UploadsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new Upload request to Microsoft teams with the included phone numbers. Only one of civic_address_id or location_id must be provided, not both. The maximum allowed phone numbers for the numbers_ids array is 1000.
     *
     * @param array{
     *   number_ids: list<string>,
     *   additional_usages?: list<'calling_user_assignment'|'first_party_app_assignment'>,
     *   civic_address_id?: string,
     *   location_id?: string,
     *   usage?: 'calling_user_assignment'|'first_party_app_assignment',
     * }|UploadCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|UploadCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadNewResponse {
        [$parsed, $options] = UploadCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UploadNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads', $id],
            body: (object) $parsed,
            options: $options,
            convert: UploadNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details of an Upload request and its phone numbers.
     *
     * @param array{id: string}|UploadRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        array|UploadRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadGetResponse {
        [$parsed, $options] = UploadRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<UploadGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/uploads/%2$s', $id, $ticketID],
            options: $options,
            convert: UploadGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your Upload requests for the given external connection.
     *
     * @param array{
     *   filter?: array{
     *     civic_address_id?: array{eq?: string},
     *     location_id?: array{eq?: string},
     *     phone_number?: array{contains?: string, eq?: string},
     *     status?: array{
     *       eq?: list<'pending_upload'|'pending'|'in_progress'|'success'|'error'>
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|UploadListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|UploadListParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadListResponse {
        [$parsed, $options] = UploadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UploadListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/uploads', $id],
            query: $parsed,
            options: $options,
            convert: UploadListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the count of all pending upload requests for the given external connection.
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadPendingCountResponse {
        /** @var BaseResponse<UploadPendingCountResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/uploads/status', $id],
            options: $requestOptions,
            convert: UploadPendingCountResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Forces a recheck of the status of all pending Upload requests for the given external connection in the background.
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRefreshStatusResponse {
        /** @var BaseResponse<UploadRefreshStatusResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads/refresh', $id],
            options: $requestOptions,
            convert: UploadRefreshStatusResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * If there were any errors during the upload process, this endpoint will retry the upload request. In some cases this will reattempt the existing upload request, in other cases it may create a new upload request. Please check the ticket_id in the response to determine if a new upload request was created.
     *
     * @param array{id: string}|UploadRetryParams $params
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        array|UploadRetryParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadRetryResponse {
        [$parsed, $options] = UploadRetryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<UploadRetryResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads/%2$s/retry', $id, $ticketID],
            options: $options,
            convert: UploadRetryResponse::class,
        );

        return $response->parse();
    }
}
