<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\Status\Eq;
use Telnyx\ExternalConnections\Uploads\UploadListResponse;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetrieveParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\UploadsRawContract;

final class UploadsRawService implements UploadsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new Upload request to Microsoft teams with the included phone numbers. Only one of civic_address_id or location_id must be provided, not both. The maximum allowed phone numbers for the numbers_ids array is 1000.
     *
     * @param string $id identifies the resource
     * @param array{
     *   numberIDs: list<string>,
     *   additionalUsages?: list<'calling_user_assignment'|'first_party_app_assignment'|AdditionalUsage>,
     *   civicAddressID?: string,
     *   locationID?: string,
     *   usage?: 'calling_user_assignment'|'first_party_app_assignment'|Usage,
     * }|UploadCreateParams $params
     *
     * @return BaseResponse<UploadNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|UploadCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UploadCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads', $id],
            body: (object) $parsed,
            options: $options,
            convert: UploadNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the details of an Upload request and its phone numbers.
     *
     * @param string $ticketID Identifies an Upload request
     * @param array{id: string}|UploadRetrieveParams $params
     *
     * @return BaseResponse<UploadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        array|UploadRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UploadRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/uploads/%2$s', $id, $ticketID],
            options: $options,
            convert: UploadGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your Upload requests for the given external connection.
     *
     * @param string $id identifies the resource
     * @param array{
     *   filter?: array{
     *     civicAddressID?: array{eq?: string},
     *     locationID?: array{eq?: string},
     *     phoneNumber?: array{contains?: string, eq?: string},
     *     status?: array{
     *       eq?: list<'pending_upload'|'pending'|'in_progress'|'success'|'error'|Eq>
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|UploadListParams $params
     *
     * @return BaseResponse<UploadListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|UploadListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UploadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/uploads', $id],
            query: $parsed,
            options: $options,
            convert: UploadListResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the count of all pending upload requests for the given external connection.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<UploadPendingCountResponse>
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/uploads/status', $id],
            options: $requestOptions,
            convert: UploadPendingCountResponse::class,
        );
    }

    /**
     * @api
     *
     * Forces a recheck of the status of all pending Upload requests for the given external connection in the background.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<UploadRefreshStatusResponse>
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads/refresh', $id],
            options: $requestOptions,
            convert: UploadRefreshStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * If there were any errors during the upload process, this endpoint will retry the upload request. In some cases this will reattempt the existing upload request, in other cases it may create a new upload request. Please check the ticket_id in the response to determine if a new upload request was created.
     *
     * @param string $ticketID Identifies an Upload request
     * @param array{id: string}|UploadRetryParams $params
     *
     * @return BaseResponse<UploadRetryResponse>
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        array|UploadRetryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UploadRetryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads/%2$s/retry', $id, $ticketID],
            options: $options,
            convert: UploadRetryResponse::class,
        );
    }
}
