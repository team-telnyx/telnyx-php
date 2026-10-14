<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Avatars\Avatar;
use Telnyx\AI\Avatars\AvatarCreateParams;
use Telnyx\AI\Avatars\AvatarID;
use Telnyx\AI\Avatars\AvatarListParams;
use Telnyx\AI\Avatars\AvatarResponse;
use Telnyx\AI\Avatars\AvatarUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AvatarsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AvatarCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AvatarCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string|AvatarID $avatarID Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        AvatarID|string $avatarID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string|AvatarID $avatarID Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     * @param array<string,mixed>|AvatarUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function update(
        AvatarID|string $avatarID,
        array|AvatarUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AvatarListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Avatar>>
     *
     * @throws APIException
     */
    public function list(
        array|AvatarListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
