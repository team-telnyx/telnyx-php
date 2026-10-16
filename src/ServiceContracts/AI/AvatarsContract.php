<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Avatars\Avatar;
use Telnyx\AI\Avatars\AvatarResponse;
use Telnyx\AI\Avatars\AvatarType;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AvatarsContract
{
    /**
     * @api
     *
     * @param string|FileParam $imageFile JPEG, PNG, or WebP image file. The maximum file size is 10 MiB.
     * @param string $name customer-facing name of the custom avatar
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string|FileParam $imageFile,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): AvatarResponse;

    /**
     * @api
     *
     * @param string $avatarID Stable identifier returned by the Avatars API. Discover available stock IDs with GET /v2/ai/avatars and filter[avatar_type]=stock rather than maintaining a fixed list. Custom avatar IDs use the `avatar_` prefix and must belong to the authenticated organization. The service validates that the selected avatar is available.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $avatarID,
        RequestOptions|array|null $requestOptions = null
    ): AvatarResponse;

    /**
     * @api
     *
     * @param string $avatarID Stable identifier returned by the Avatars API. Discover available stock IDs with GET /v2/ai/avatars and filter[avatar_type]=stock rather than maintaining a fixed list. Custom avatar IDs use the `avatar_` prefix and must belong to the authenticated organization. The service validates that the selected avatar is available.
     * @param string $name new customer-facing name of the custom avatar
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $avatarID,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): AvatarResponse;

    /**
     * @api
     *
     * @param AvatarType|value-of<AvatarType> $filterAvatarType return only stock or custom avatars
     * @param string $filterID return the avatar with this exact ID
     * @param string $filterName return avatars whose names contain this value, using case-insensitive matching
     * @param int $pageNumber page number to retrieve, starting at 1
     * @param int $pageSize number of avatars to return per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Avatar>
     *
     * @throws APIException
     */
    public function list(
        AvatarType|string|null $filterAvatarType = null,
        ?string $filterID = null,
        ?string $filterName = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
