<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsContract;

final class GlobalIPAssignmentsService implements GlobalIPAssignmentsContract
{
    /**
     * @api
     */
    public GlobalIPAssignmentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPAssignmentsRawService($client);
    }

    /**
     * @api
     *
     * Create a Global IP assignment.
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
    ): GlobalIPAssignmentNewResponse {
        $params = Util::removeNulls(
            [
                'globalIPID' => $globalIPID,
                'isInMaintenance' => $isInMaintenance,
                'wireguardPeerID' => $wireguardPeerID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Global IP assignment.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Global IP assignment.
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
    ): GlobalIPAssignmentUpdateResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IP assignments.
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
    ): GlobalIPAssignmentListResponse {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Global IP assignment.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
