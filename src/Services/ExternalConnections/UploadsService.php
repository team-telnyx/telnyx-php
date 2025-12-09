<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\Uploads\Upload;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\Status\Eq;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\UploadsContract;

final class UploadsService implements UploadsContract
{
    /**
     * @api
     */
    public UploadsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UploadsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new Upload request to Microsoft teams with the included phone numbers. Only one of civic_address_id or location_id must be provided, not both. The maximum allowed phone numbers for the numbers_ids array is 1000.
     *
     * @param string $id identifies the resource
     * @param list<string> $numberIDs
     * @param list<'calling_user_assignment'|'first_party_app_assignment'|AdditionalUsage> $additionalUsages
     * @param string $civicAddressID identifies the civic address to assign all phone numbers to
     * @param string $locationID identifies the location to assign all phone numbers to
     * @param 'calling_user_assignment'|'first_party_app_assignment'|Usage $usage The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array $numberIDs,
        ?array $additionalUsages = null,
        ?string $civicAddressID = null,
        ?string $locationID = null,
        string|Usage|null $usage = null,
        ?RequestOptions $requestOptions = null,
    ): UploadNewResponse {
        $params = [
            'numberIDs' => $numberIDs,
            'additionalUsages' => $additionalUsages,
            'civicAddressID' => $civicAddressID,
            'locationID' => $locationID,
            'usage' => $usage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details of an Upload request and its phone numbers.
     *
     * @param string $ticketID Identifies an Upload request
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadGetResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($ticketID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your Upload requests for the given external connection.
     *
     * @param string $id identifies the resource
     * @param array{
     *   civicAddressID?: array{eq?: string},
     *   locationID?: array{eq?: string},
     *   phoneNumber?: array{contains?: string, eq?: string},
     *   status?: array{
     *     eq?: list<'pending_upload'|'pending'|'in_progress'|'success'|'error'|Eq>
     *   },
     * } $filter Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<Upload>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the count of all pending upload requests for the given external connection.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadPendingCountResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pendingCount($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Forces a recheck of the status of all pending Upload requests for the given external connection in the background.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRefreshStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refreshStatus($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If there were any errors during the upload process, this endpoint will retry the upload request. In some cases this will reattempt the existing upload request, in other cases it may create a new upload request. Please check the ticket_id in the response to determine if a new upload request was created.
     *
     * @param string $ticketID Identifies an Upload request
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRetryResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retry($ticketID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
