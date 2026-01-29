<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TexmlApplications\TexmlApplication;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TexmlApplicationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TexmlApplicationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TexmlApplicationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|TexmlApplicationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TexmlApplicationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TexmlApplicationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TexmlApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|TexmlApplicationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
