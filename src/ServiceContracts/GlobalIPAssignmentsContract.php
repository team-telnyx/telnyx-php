<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return GlobalIPAssignmentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentNewResponse;

    /**
     * @api
     *
     * @return GlobalIPAssignmentGetResponse<HasRawResponse>
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
     * @return GlobalIPAssignmentGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentGetResponse;

    /**
     * @api
     *
     * @param Body $body
     *
     * @return GlobalIPAssignmentUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $body,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return GlobalIPAssignmentUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return GlobalIPAssignmentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return GlobalIPAssignmentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentListResponse;

    /**
     * @api
     *
     * @return GlobalIPAssignmentDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse;

    /**
     * @api
     *
     * @return GlobalIPAssignmentDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentDeleteResponse;
}
