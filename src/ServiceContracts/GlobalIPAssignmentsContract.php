<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPAssignments\GlobalIPAssignment;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        string $globalIPAssignmentID,
        GlobalIPAssignmentUpdateRequest $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|GlobalIPAssignmentListParams $params
     *
     * @return DefaultPagination<GlobalIPAssignment>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPAssignmentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse;
}
