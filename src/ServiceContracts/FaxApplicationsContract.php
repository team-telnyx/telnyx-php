<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\FaxApplications\FaxApplication;
use Telnyx\FaxApplications\FaxApplicationCreateParams;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateParams;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;

interface FaxApplicationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|FaxApplicationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FaxApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxApplicationGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|FaxApplicationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FaxApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|FaxApplicationListParams $params
     *
     * @return DefaultPagination<FaxApplication>
     *
     * @throws APIException
     */
    public function list(
        array|FaxApplicationListParams $params,
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
    ): FaxApplicationDeleteResponse;
}
