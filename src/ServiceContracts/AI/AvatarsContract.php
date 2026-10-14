<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Avatars\Avatar;
use Telnyx\AI\Avatars\AvatarID;
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
     * @param string|AvatarID $avatarID Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        AvatarID|string $avatarID,
        RequestOptions|array|null $requestOptions = null,
    ): AvatarResponse;

    /**
     * @api
     *
     * @param string|AvatarID $avatarID Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     * @param string $name new customer-facing name of the custom avatar
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        AvatarID|string $avatarID,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): AvatarResponse;

    /**
     * @api
     *
     * @param AvatarType|value-of<AvatarType> $filterAvatarType return only stock or custom avatars
     * @param string|AvatarID|value-of<AvatarID> $filterID return the avatar with this exact ID
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
        AvatarID|string|null $filterID = null,
        ?string $filterName = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
