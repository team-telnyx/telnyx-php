<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Page;
use Telnyx\ExternalConnections\Uploads\UploadListResponse;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface UploadsContract
{
    /**
     * @api
     *
     * @param list<string> $numberIDs
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     * @param string $civicAddressID identifies the civic address to assign all phone numbers to
     * @param string $locationID identifies the location to assign all phone numbers to
     * @param Usage|value-of<Usage> $usage The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     */
    public function create(
        string $id,
        $numberIDs,
        $additionalUsages = omit,
        $civicAddressID = omit,
        $locationID = omit,
        $usage = omit,
        ?RequestOptions $requestOptions = null,
    ): UploadNewResponse;

    /**
     * @api
     *
     * @param string $id
     */
    public function retrieve(
        string $ticketID,
        $id,
        ?RequestOptions $requestOptions = null
    ): UploadGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): UploadListResponse;

    /**
     * @api
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadPendingCountResponse;

    /**
     * @api
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRefreshStatusResponse;

    /**
     * @api
     *
     * @param string $id
     */
    public function retry(
        string $ticketID,
        $id,
        ?RequestOptions $requestOptions = null
    ): UploadRetryResponse;
}
