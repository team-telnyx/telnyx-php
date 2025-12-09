<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;

interface GlobalIPAssignmentsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
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
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
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
    ): DefaultPagination;

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
