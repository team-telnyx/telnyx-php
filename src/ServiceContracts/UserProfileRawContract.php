<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UserProfile\UserProfileListResponse;
use Telnyx\UserProfile\UserProfilePatchAllParams;
use Telnyx\UserProfile\UserProfilePatchAllResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserProfileRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserProfileListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserProfilePatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserProfilePatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        array|UserProfilePatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
