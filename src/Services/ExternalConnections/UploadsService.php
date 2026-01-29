<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\Uploads\Upload;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Page;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\UploadsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\Uploads\UploadListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ExternalConnections\Uploads\UploadListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     * @param string $civicAddressID identifies the civic address to assign all phone numbers to
     * @param string $locationID identifies the location to assign all phone numbers to
     * @param Usage|value-of<Usage> $usage The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array $numberIDs,
        ?array $additionalUsages = null,
        ?string $civicAddressID = null,
        ?string $locationID = null,
        Usage|string|null $usage = null,
        RequestOptions|array|null $requestOptions = null,
    ): UploadNewResponse {
        $params = Util::removeNulls(
            [
                'numberIDs' => $numberIDs,
                'additionalUsages' => $additionalUsages,
                'civicAddressID' => $civicAddressID,
                'locationID' => $locationID,
                'usage' => $usage,
            ],
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): UploadGetResponse {
        $params = Util::removeNulls(['id' => $id]);

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
     * @param Filter|FilterShape $filter Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<Upload>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): UploadRetryResponse {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retry($ticketID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
