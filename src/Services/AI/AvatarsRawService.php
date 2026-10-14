<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Avatars\Avatar;
use Telnyx\AI\Avatars\AvatarCreateParams;
use Telnyx\AI\Avatars\AvatarID;
use Telnyx\AI\Avatars\AvatarListParams;
use Telnyx\AI\Avatars\AvatarResponse;
use Telnyx\AI\Avatars\AvatarType;
use Telnyx\AI\Avatars\AvatarUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AvatarsRawContract;

/**
 * Create and manage real-time AI avatars.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AvatarsRawService implements AvatarsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Uploads an image, validates its file type, size, safe decoding, and resolution, stores it in Telnyx-managed private storage, and creates an avatar owned by the authenticated organization. Creating an avatar does not update an AI Assistant; use the returned ID separately wherever the avatar is consumed. The avatar image is stored independently from the rendering model and background, which are selected where the avatar is consumed. Supported image types are JPEG, PNG, and WebP. Images may be up to 10 MiB, must be between 256 and 8192 pixels on each side, and may contain at most 40 megapixels. Each organization may have up to 20 custom avatars. For best results, use a 16:9 landscape image, preferably 1920 by 1080 pixels and at least 1280 by 720 pixels. Show one centered, front-facing person from the shoulders up, keep the full head and hair visible with space around it, and use a sharp, evenly lit image with unobstructed eyes and mouth. Use a transparent PNG or WebP when the avatar will be combined with a selectable background. These composition recommendations are not enforced in the first release; the first release does not validate the number of faces, pose, or image content.
     *
     * @param array{
     *   imageFile: string|FileParam, name: string
     * }|AvatarCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AvatarCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AvatarCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/avatars',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: AvatarResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a Telnyx stock avatar or a custom avatar owned by the authenticated organization. A custom avatar belonging to another organization is returned as not found.
     *
     * @param string|AvatarID|value-of<AvatarID> $avatarID Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvatarResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        AvatarID|string $avatarID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/avatars/%1$s', $avatarID],
            options: $requestOptions,
            convert: AvatarResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the customer-facing name of a custom avatar owned by the authenticated organization. Stock avatars cannot be modified. To replace the image, create a new custom avatar so existing references keep their original content.
     *
     * @param string|AvatarID|value-of<AvatarID> $avatarID Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     * @param array{name: string}|AvatarUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AvatarUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/avatars/%1$s', $avatarID],
            body: (object) $parsed,
            options: $options,
            convert: AvatarResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of the Telnyx stock avatars and custom avatars available to the authenticated organization. Custom avatars owned by other organizations are never returned. The `image_url` value is suitable for displaying a thumbnail and may be refreshed by listing or retrieving the avatar again.
     *
     * @param array{
     *   filterAvatarType?: AvatarType|value-of<AvatarType>,
     *   filterID?: string|AvatarID|value-of<AvatarID>,
     *   filterName?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|AvatarListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Avatar>>
     *
     * @throws APIException
     */
    public function list(
        array|AvatarListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AvatarListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/avatars',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterAvatarType' => 'filter[avatar_type]',
                    'filterID' => 'filter[id]',
                    'filterName' => 'filter[name]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: Avatar::class,
            page: DefaultFlatPagination::class,
        );
    }
}
