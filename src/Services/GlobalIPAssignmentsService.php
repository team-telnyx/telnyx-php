<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest;
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
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentNewResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'global_ip_assignments',
            options: $requestOptions,
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
     * @throws APIException
     */
    public function update(
        string $globalIPAssignmentID,
        GlobalIPAssignmentUpdateRequest $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentUpdateResponse {
        [$parsed, $options] = GlobalIPAssignmentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['global_ip_assignments/%1$s', $globalIPAssignmentID],
            body: (object) $parsed['globalIpAssignmentUpdateRequest'],
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
     * @return DefaultPagination<GlobalIPAssignment>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPAssignmentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = GlobalIPAssignmentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_assignments',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignment::class,
            page: DefaultPagination::class,
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentDeleteResponse::class,
        );
    }
}
