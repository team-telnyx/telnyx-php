<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type GlobalIPAssignmentUpdateRequestShape from \Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface GlobalIPAssignmentsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPAssignmentNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPAssignmentGetResponse;

    /**
     * @api
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
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse;
}
