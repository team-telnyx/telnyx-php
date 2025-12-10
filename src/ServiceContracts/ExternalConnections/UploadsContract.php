<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\Status\Eq;
use Telnyx\ExternalConnections\Uploads\UploadListResponse;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;

interface UploadsContract
{
    /**
     * @api
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
    ): UploadNewResponse;

    /**
     * @api
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
    ): UploadGetResponse;

    /**
     * @api
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
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): UploadListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadPendingCountResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRefreshStatusResponse;

    /**
     * @api
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
    ): UploadRetryResponse;
}
