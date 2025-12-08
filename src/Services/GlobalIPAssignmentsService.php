<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentCreateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsContract;

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
     * @param array{
     *   global_ip_id?: string, is_in_maintenance?: bool, wireguard_peer_id?: string
     * }|GlobalIPAssignmentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPAssignmentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentNewResponse {
        [$parsed, $options] = GlobalIPAssignmentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPAssignmentNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'global_ip_assignments',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPAssignmentNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Global IP assignment.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse {
        /** @var BaseResponse<GlobalIPAssignmentGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Global IP assignment.
     *
     * @param array{
     *   id?: string,
     *   created_at?: string,
     *   record_type?: string,
     *   updated_at?: string,
     *   global_ip_id?: string,
     *   is_announced?: bool,
     *   is_connected?: bool,
     *   is_in_maintenance?: bool,
     *   status?: 'created'|'provisioning'|'provisioned'|'deleting'|InterfaceStatus,
     *   wireguard_peer_id?: string,
     * } $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse {
        [$parsed, $options] = GlobalIPAssignmentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPAssignmentUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['global_ip_assignments/%1$s', $id],
            body: (object) $parsed['body'],
            options: $options,
            convert: GlobalIPAssignmentUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IP assignments.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|GlobalIPAssignmentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPAssignmentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentListResponse {
        [$parsed, $options] = GlobalIPAssignmentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPAssignmentListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'global_ip_assignments',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Global IP assignment.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse {
        /** @var BaseResponse<GlobalIPAssignmentDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentDeleteResponse::class,
        );

        return $response->parse();
    }
}
