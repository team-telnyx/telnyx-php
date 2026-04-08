<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\EnterpriseCreateParams;
use Telnyx\Enterprises\EnterpriseGetResponse;
use Telnyx\Enterprises\EnterpriseListParams;
use Telnyx\Enterprises\EnterpriseNewResponse;
use Telnyx\Enterprises\EnterprisePublic;
use Telnyx\Enterprises\EnterpriseUpdateParams;
use Telnyx\Enterprises\EnterpriseUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EnterprisesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EnterpriseCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EnterpriseCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array<string,mixed>|EnterpriseUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        array|EnterpriseUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EnterpriseListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EnterprisePublic>>
     *
     * @throws APIException
     */
    public function list(
        array|EnterpriseListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
