<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a paginated list of the Telnyx stock avatars and custom avatars available to the authenticated organization. Custom avatars owned by other organizations are never returned. The `image_url` value is suitable for displaying a thumbnail and may be refreshed by listing or retrieving the avatar again. `suggested_voice_id` recommends a compatible Telnyx voice for stock avatars and is an empty string for custom avatars; it does not change an AI Assistant's voice automatically.
 *
 * @see Telnyx\Services\AI\AvatarsService::list()
 *
 * @phpstan-type AvatarListParamsShape = array{
 *   filterAvatarType?: null|AvatarType|value-of<AvatarType>,
 *   filterID?: string|null,
 *   filterName?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class AvatarListParams implements BaseModel
{
    /** @use SdkModel<AvatarListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return only stock or custom avatars.
     *
     * @var value-of<AvatarType>|null $filterAvatarType
     */
    #[Optional(enum: AvatarType::class)]
    public ?string $filterAvatarType;

    /**
     * Return the avatar with this exact ID.
     */
    #[Optional]
    public ?string $filterID;

    /**
     * Return avatars whose names contain this value, using case-insensitive matching.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Page number to retrieve, starting at 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of avatars to return per page.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AvatarType|value-of<AvatarType>|null $filterAvatarType
     */
    public static function with(
        AvatarType|string|null $filterAvatarType = null,
        ?string $filterID = null,
        ?string $filterName = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterAvatarType && $self['filterAvatarType'] = $filterAvatarType;
        null !== $filterID && $self['filterID'] = $filterID;
        null !== $filterName && $self['filterName'] = $filterName;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Return only stock or custom avatars.
     *
     * @param AvatarType|value-of<AvatarType> $filterAvatarType
     */
    public function withFilterAvatarType(
        AvatarType|string $filterAvatarType
    ): self {
        $self = clone $this;
        $self['filterAvatarType'] = $filterAvatarType;

        return $self;
    }

    /**
     * Return the avatar with this exact ID.
     */
    public function withFilterID(string $filterID): self
    {
        $self = clone $this;
        $self['filterID'] = $filterID;

        return $self;
    }

    /**
     * Return avatars whose names contain this value, using case-insensitive matching.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Page number to retrieve, starting at 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of avatars to return per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
