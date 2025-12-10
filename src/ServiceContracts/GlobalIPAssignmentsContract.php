<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\RequestOptions;

interface GlobalIPAssignmentsContract
{
    /**
     * @api
     *
     * @param string $globalIPID global IP ID
     * @param bool $isInMaintenance enable/disable BGP announcement
     * @param string $wireguardPeerID wireguard peer ID
     *
     * @throws APIException
     */
    public function create(
        ?string $globalIPID = null,
        ?bool $isInMaintenance = null,
        ?string $wireguardPeerID = null,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array{
     *   id?: string,
     *   createdAt?: string,
     *   recordType?: string,
     *   updatedAt?: string,
     *   globalIPID?: string,
     *   isAnnounced?: bool,
     *   isConnected?: bool,
     *   isInMaintenance?: bool,
     *   status?: 'created'|'provisioning'|'provisioned'|'deleting'|InterfaceStatus,
     *   wireguardPeerID?: string,
     * } $body
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array $body,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse;
}
