<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
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
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentNewResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(requestOptions: $requestOptions);

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
     * @param string $globalIPAssignmentID identifies the resource
     * @param array{
     *   id?: string,
     *   createdAt?: string,
     *   recordType?: string,
     *   updatedAt?: string,
     *   globalIPID?: string,
     *   wireguardPeerID?: string,
     * } $globalIPAssignmentUpdateRequest
     *
     * @throws APIException
     */
    public function update(
        string $globalIPAssignmentID,
        array $globalIPAssignmentUpdateRequest,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentUpdateResponse {
        $params = [
            'globalIPAssignmentUpdateRequest' => $globalIPAssignmentUpdateRequest,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($globalIPAssignmentID, params: $params, requestOptions: $requestOptions);

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
     * @return DefaultPagination<GlobalIPAssignment>
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        $params = ['page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
