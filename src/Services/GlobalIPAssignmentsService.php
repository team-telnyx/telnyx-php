<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentCreateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams\Page;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\Body;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsContract;

use const Telnyx\Core\OMIT as omit;

final class GlobalIPAssignmentsService implements GlobalIPAssignmentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Global IP assignment.
     *
     * @param string $globalIPID global IP ID
     * @param bool $isInMaintenance enable/disable BGP announcement
     * @param string $wireguardPeerID wireguard peer ID
     */
    public function create(
        $globalIPID = omit,
        $isInMaintenance = omit,
        $wireguardPeerID = omit,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentNewResponse {
        [$parsed, $options] = GlobalIPAssignmentCreateParams::parseRequest(
            [
                'globalIPID' => $globalIPID,
                'isInMaintenance' => $isInMaintenance,
                'wireguardPeerID' => $wireguardPeerID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'global_ip_assignments',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPAssignmentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Global IP assignment.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Global IP assignment.
     *
     * @param Body $body
     */
    public function update(
        string $id,
        $body,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse {
        [$parsed, $options] = GlobalIPAssignmentUpdateParams::parseRequest(
            ['body' => $body],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['global_ip_assignments/%1$s', $id],
            body: (object) $parsed['body'],
            options: $options,
            convert: GlobalIPAssignmentUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Global IP assignments.
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentListResponse {
        [$parsed, $options] = GlobalIPAssignmentListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_assignments',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Global IP assignment.
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentDeleteResponse::class,
        );
    }
}
