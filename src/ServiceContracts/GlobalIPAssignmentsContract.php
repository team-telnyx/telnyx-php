<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentCreateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;

interface GlobalIPAssignmentsContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPAssignmentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPAssignmentCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param array<mixed>|GlobalIPAssignmentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|GlobalIPAssignmentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|GlobalIPAssignmentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPAssignmentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentListResponse;

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
