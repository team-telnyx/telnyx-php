<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Page;
use Telnyx\ExternalConnections\Uploads\UploadListResponse;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetrieveParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\UploadsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param list<string> $numberIDs
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     * @param string $civicAddressID identifies the civic address to assign all phone numbers to
     * @param string $locationID identifies the location to assign all phone numbers to
     * @param Usage|value-of<Usage> $usage The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     *
     * @throws APIException
     */
    public function create(
        string $id,
        $numberIDs,
        $additionalUsages = omit,
        $civicAddressID = omit,
        $locationID = omit,
        $usage = omit,
        ?RequestOptions $requestOptions = null,
    ): UploadNewResponse {
        $params = [
            'numberIDs' => $numberIDs,
            'additionalUsages' => $additionalUsages,
            'civicAddressID' => $civicAddressID,
            'locationID' => $locationID,
            'usage' => $usage,
        ];

        return $this->createRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UploadNewResponse {
        [$parsed, $options] = UploadCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $id
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        $id,
        ?RequestOptions $requestOptions = null
    ): UploadGetResponse {
        $params = ['id' => $id];

        return $this->retrieveRaw($ticketID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $ticketID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UploadGetResponse {
        [$parsed, $options] = UploadRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): UploadListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UploadListResponse {
        [$parsed, $options] = UploadListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadPendingCountResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRefreshStatusResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $id
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        $id,
        ?RequestOptions $requestOptions = null
    ): UploadRetryResponse {
        $params = ['id' => $id];

        return $this->retryRaw($ticketID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retryRaw(
        string $ticketID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UploadRetryResponse {
        [$parsed, $options] = UploadRetryParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['external_connections/%1$s/uploads/%2$s/retry', $id, $ticketID],
            options: $options,
            convert: UploadRetryResponse::class,
        );
    }
}
