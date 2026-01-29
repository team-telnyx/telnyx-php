<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsContract;

/**
 * @phpstan-import-type GlobalIPAssignmentUpdateRequestShape from \Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param GlobalIPAssignmentUpdateRequest|GlobalIPAssignmentUpdateRequestShape $globalIPAssignmentUpdateRequest
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $globalIPAssignmentID,
        GlobalIPAssignmentUpdateRequest|array $globalIPAssignmentUpdateRequest,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPAssignmentUpdateResponse {
        $params = Util::removeNulls(
            ['globalIPAssignmentUpdateRequest' => $globalIPAssignmentUpdateRequest]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($globalIPAssignmentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IP assignments.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<GlobalIPAssignment>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
