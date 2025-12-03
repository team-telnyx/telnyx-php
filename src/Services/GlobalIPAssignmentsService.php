<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentCreateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\Body;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
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

        // @phpstan-ignore-next-line return.type
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse {
        // @phpstan-ignore-next-line return.type
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
     * @throws APIException
     */
    public function update(
        string $id,
        Body $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse {
        [$parsed, $options] = GlobalIPAssignmentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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

        // @phpstan-ignore-next-line return.type
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentDeleteResponse::class,
        );
    }
}
