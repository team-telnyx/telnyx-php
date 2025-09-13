<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentDeleteResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentGetResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListParams\Page;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentListResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentNewResponse;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\Body;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface GlobalIPAssignmentsContract
{
    /**
     * @api
     *
     * @param string $globalIPID global IP ID
     * @param bool $isInMaintenance enable/disable BGP announcement
     * @param string $wireguardPeerID wireguard peer ID
     *
     * @return GlobalIPAssignmentNewResponse<HasRawResponse>
     */
    public function create(
        $globalIPID = omit,
        $isInMaintenance = omit,
        $wireguardPeerID = omit,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentNewResponse;

    /**
     * @api
     *
     * @return GlobalIPAssignmentGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse;

    /**
     * @api
     *
     * @param Body $body
     *
     * @return GlobalIPAssignmentUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $body,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return GlobalIPAssignmentListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentListResponse;

    /**
     * @api
     *
     * @return GlobalIPAssignmentDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse;
}
