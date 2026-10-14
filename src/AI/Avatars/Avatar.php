<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

use Telnyx\AI\Avatars\Avatar\ContentType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AvatarShape = array{
 *   id: string|AvatarID|value-of<AvatarID>,
 *   avatarType: AvatarType|value-of<AvatarType>,
 *   hosted: bool,
 *   imageURL: string,
 *   name: string,
 *   provider: 'telnyx',
 *   contentType?: null|ContentType|value-of<ContentType>,
 *   createdAt?: \DateTimeInterface|null,
 *   heightPx?: int|null,
 *   imageURLExpiresAt?: \DateTimeInterface|null,
 *   sizeBytes?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   widthPx?: int|null,
 * }
 */
final class Avatar implements BaseModel
{
    /** @use SdkModel<AvatarShape> */
    use SdkModel;

    /**
     * Indicates that avatar rendering runs on Telnyx-operated infrastructure.
     */
    #[Required]
    public bool $hosted = true;

    /**
     * Avatar provider. The first release supports Telnyx avatars.
     *
     * @var 'telnyx' $provider
     */
    #[Required]
    public string $provider = 'telnyx';

    /**
     * Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     *
     * @var string|value-of<AvatarID> $id
     */
    #[Required(enum: AvatarID::class)]
    public string $id;

    /**
     * Whether the avatar is provided by Telnyx or was uploaded by the authenticated organization.
     *
     * @var value-of<AvatarType> $avatarType
     */
    #[Required('avatar_type', enum: AvatarType::class)]
    public string $avatarType;

    /**
     * HTTPS image URL suitable for an avatar selection thumbnail. If the URL expires, list or retrieve the avatar again to refresh it.
     */
    #[Required('image_url')]
    public string $imageURL;

    /**
     * Customer-facing avatar name.
     */
    #[Required]
    public string $name;

    /**
     * MIME type of a custom avatar image.
     *
     * @var value-of<ContentType>|null $contentType
     */
    #[Optional('content_type', enum: ContentType::class)]
    public ?string $contentType;

    /**
     * Time when the custom avatar was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Decoded height of a custom avatar image.
     */
    #[Optional('height_px')]
    public ?int $heightPx;

    /**
     * Expiration time of `image_url`. Omitted when the URL does not expire.
     */
    #[Optional('image_url_expires_at')]
    public ?\DateTimeInterface $imageURLExpiresAt;

    /**
     * Size of a custom avatar image in bytes.
     */
    #[Optional('size_bytes')]
    public ?int $sizeBytes;

    /**
     * Time when the custom avatar was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Decoded width of a custom avatar image.
     */
    #[Optional('width_px')]
    public ?int $widthPx;

    /**
     * `new Avatar()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Avatar::with(id: ..., avatarType: ..., imageURL: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Avatar)->withID(...)->withAvatarType(...)->withImageURL(...)->withName(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|AvatarID|value-of<AvatarID> $id
     * @param AvatarType|value-of<AvatarType> $avatarType
     * @param ContentType|value-of<ContentType>|null $contentType
     */
    public static function with(
        AvatarID|string $id,
        AvatarType|string $avatarType,
        string $imageURL,
        string $name,
        ContentType|string|null $contentType = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $heightPx = null,
        ?\DateTimeInterface $imageURLExpiresAt = null,
        ?int $sizeBytes = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $widthPx = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['avatarType'] = $avatarType;
        $self['imageURL'] = $imageURL;
        $self['name'] = $name;

        null !== $contentType && $self['contentType'] = $contentType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $heightPx && $self['heightPx'] = $heightPx;
        null !== $imageURLExpiresAt && $self['imageURLExpiresAt'] = $imageURLExpiresAt;
        null !== $sizeBytes && $self['sizeBytes'] = $sizeBytes;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $widthPx && $self['widthPx'] = $widthPx;

        return $self;
    }

    /**
     * Stable identifier of a Telnyx stock avatar or an organization-owned custom avatar. Custom avatar IDs are returned by the Avatars API and use the `avatar_` prefix.
     *
     * @param string|AvatarID|value-of<AvatarID> $id
     */
    public function withID(AvatarID|string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether the avatar is provided by Telnyx or was uploaded by the authenticated organization.
     *
     * @param AvatarType|value-of<AvatarType> $avatarType
     */
    public function withAvatarType(AvatarType|string $avatarType): self
    {
        $self = clone $this;
        $self['avatarType'] = $avatarType;

        return $self;
    }

    /**
     * Indicates that avatar rendering runs on Telnyx-operated infrastructure.
     */
    public function withHosted(bool $hosted): self
    {
        $self = clone $this;
        $self['hosted'] = $hosted;

        return $self;
    }

    /**
     * HTTPS image URL suitable for an avatar selection thumbnail. If the URL expires, list or retrieve the avatar again to refresh it.
     */
    public function withImageURL(string $imageURL): self
    {
        $self = clone $this;
        $self['imageURL'] = $imageURL;

        return $self;
    }

    /**
     * Customer-facing avatar name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Avatar provider. The first release supports Telnyx avatars.
     *
     * @param 'telnyx' $provider
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * MIME type of a custom avatar image.
     *
     * @param ContentType|value-of<ContentType> $contentType
     */
    public function withContentType(ContentType|string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * Time when the custom avatar was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Decoded height of a custom avatar image.
     */
    public function withHeightPx(int $heightPx): self
    {
        $self = clone $this;
        $self['heightPx'] = $heightPx;

        return $self;
    }

    /**
     * Expiration time of `image_url`. Omitted when the URL does not expire.
     */
    public function withImageURLExpiresAt(
        \DateTimeInterface $imageURLExpiresAt
    ): self {
        $self = clone $this;
        $self['imageURLExpiresAt'] = $imageURLExpiresAt;

        return $self;
    }

    /**
     * Size of a custom avatar image in bytes.
     */
    public function withSizeBytes(int $sizeBytes): self
    {
        $self = clone $this;
        $self['sizeBytes'] = $sizeBytes;

        return $self;
    }

    /**
     * Time when the custom avatar was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Decoded width of a custom avatar image.
     */
    public function withWidthPx(int $widthPx): self
    {
        $self = clone $this;
        $self['widthPx'] = $widthPx;

        return $self;
    }
}
