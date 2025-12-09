<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse;
use Telnyx\OAuthGrants\OAuthGrantGetResponse;
use Telnyx\OAuthGrants\OAuthGrantListParams;
use Telnyx\OAuthGrants\OAuthGrantListResponse;
use Telnyx\RequestOptions;

interface OAuthGrantsRawContract
{
    /**
     * @api
     *
     * @param string $id OAuth grant ID
     *
     * @return BaseResponse<OAuthGrantGetResponse>
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
     * @param array<mixed>|OAuthGrantListParams $params
     *
     * @return BaseResponse<OAuthGrantListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|OAuthGrantListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id OAuth grant ID
     *
     * @return BaseResponse<OAuthGrantDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
