<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Avatars\Avatar;
use Telnyx\AI\Avatars\AvatarCreateParams;
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
     * @param string $avatarID Stable identifier returned by the Avatars API. Discover available stock IDs with GET /v2/ai/avatars and filter[avatar_type]=stock rather than maintaining a fixed list. Custom avatar IDs use the `avatar_` prefix and must belong to the authenticated organization. The service validates that the selected avatar is available.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $avatarID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $avatarID Stable identifier returned by the Avatars API. Discover available stock IDs with GET /v2/ai/avatars and filter[avatar_type]=stock rather than maintaining a fixed list. Custom avatar IDs use the `avatar_` prefix and must belong to the authenticated organization. The service validates that the selected avatar is available.
     * @param array<string,mixed>|AvatarUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function update(
        string $avatarID,
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
