<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallControlApplications\CallControlApplication;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationListParams;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallControlApplicationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallControlApplicationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CallControlApplicationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationGetResponse>
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
     * @param array<string,mixed>|CallControlApplicationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CallControlApplicationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallControlApplicationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CallControlApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|CallControlApplicationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
