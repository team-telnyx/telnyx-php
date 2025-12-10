<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
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

interface FaxApplicationsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|FaxApplicationCreateParams $params
     *
     * @return BaseResponse<FaxApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FaxApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<FaxApplicationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|FaxApplicationUpdateParams $params
     *
     * @return BaseResponse<FaxApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FaxApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FaxApplicationListParams $params
     *
     * @return BaseResponse<DefaultPagination<FaxApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|FaxApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<FaxApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
