<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Avatars\Avatar;
use Telnyx\AI\Avatars\AvatarResponse;
use Telnyx\AI\Avatars\AvatarType;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AvatarsContract;

/**
 * Create and manage real-time AI avatars.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AvatarsService implements AvatarsContract
{
    /**
     * @api
     */
    public AvatarsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AvatarsRawService($client);
    }

    /**
     * @api
     *
     * Uploads an image, validates its file type, size, safe decoding, and resolution, stores it in Telnyx-managed private storage, and creates an avatar owned by the authenticated organization. Creating an avatar does not update an AI Assistant; use the returned ID separately wherever the avatar is consumed. The avatar image is stored independently from the rendering model and background, which are selected where the avatar is consumed. Supported image types are JPEG, PNG, and WebP. Images may be up to 10 MiB, must be between 256 and 8192 pixels on each side, and may contain at most 40 megapixels. A per-organization custom-avatar quota applies; the create request returns an error when the quota is reached. For best results, use a 16:9 landscape image, preferably 1920 by 1080 pixels and at least 1280 by 720 pixels. Show one centered, front-facing person from the shoulders up, keep the full head and hair visible with space around it, and use a sharp, evenly lit image with unobstructed eyes and mouth. Use a transparent PNG or WebP when the avatar will be combined with a selectable background. These composition recommendations are not enforced in the first release; the first release does not validate the number of faces, pose, or image content.
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
    ): AvatarResponse {
        $params = ['imageFile' => $imageFile, 'name' => $name];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a Telnyx stock avatar or a custom avatar owned by the authenticated organization. A custom avatar belonging to another organization is returned as not found.
     *
     * @param string $avatarID Stable identifier returned by the Avatars API. Discover available stock IDs with GET /v2/ai/avatars and filter[avatar_type]=stock rather than maintaining a fixed list. Custom avatar IDs use the `avatar_` prefix and must belong to the authenticated organization. The service validates that the selected avatar is available.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $avatarID,
        RequestOptions|array|null $requestOptions = null
    ): AvatarResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($avatarID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the customer-facing name of a custom avatar owned by the authenticated organization. Stock avatars cannot be modified. To replace the image, create a new custom avatar so existing references keep their original content.
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
    ): AvatarResponse {
        $params = ['name' => $name];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($avatarID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of the Telnyx stock avatars and custom avatars available to the authenticated organization. Custom avatars owned by other organizations are never returned. The `image_url` value is suitable for displaying a thumbnail and may be refreshed by listing or retrieving the avatar again. `suggested_voice_id` recommends a compatible Telnyx voice for stock avatars and is an empty string for custom avatars; it does not change an AI Assistant's voice automatically.
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
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filterAvatarType' => $filterAvatarType ?? Omitted::VALUE,
                'filterID' => $filterID ?? Omitted::VALUE,
                'filterName' => $filterName ?? Omitted::VALUE,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
