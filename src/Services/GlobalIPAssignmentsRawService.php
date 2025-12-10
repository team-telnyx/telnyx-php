<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsRawContract;

final class GlobalIPAssignmentsRawService implements GlobalIPAssignmentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Global IP assignment.
     *
     * @return BaseResponse<GlobalIPAssignmentNewResponse>
     *
     * @throws APIException
     */
    public function create(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     *
     * @return BaseResponse<GlobalIPAssignmentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $globalIPAssignmentID identifies the resource
     * @param array{
     *   globalIPAssignmentUpdateRequest: array{
     *     id?: string,
     *     createdAt?: string,
     *     recordType?: string,
     *     updatedAt?: string,
     *     globalIPID?: string,
     *     wireguardPeerID?: string,
     *   },
     * }|GlobalIPAssignmentUpdateParams $params
     *
     * @return BaseResponse<GlobalIPAssignmentUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $globalIPAssignmentID,
        array|GlobalIPAssignmentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GlobalIPAssignmentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['global_ip_assignments/%1$s', $globalIPAssignmentID],
            body: (object) $parsed['globalIPAssignmentUpdateRequest'],
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
     * @return BaseResponse<DefaultPagination<GlobalIPAssignment>>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPAssignmentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
            convert: GlobalIPAssignment::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Global IP assignment.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<GlobalIPAssignmentDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['global_ip_assignments/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPAssignmentDeleteResponse::class,
        );
    }
}
