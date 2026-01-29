<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List Mobile Voice Connections.
 *
 * @see Telnyx\Services\MobileVoiceConnectionsService::list()
 *
 * @phpstan-type MobileVoiceConnectionListParamsShape = array{
 *   filterConnectionNameContains?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: string|null,
 * }
 */
final class MobileVoiceConnectionListParams implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by connection name containing the given string.
     */
    #[Optional]
    public ?string $filterConnectionNameContains;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Sort by field (e.g., created_at, connection_name, active). Prefix with - for descending order.
     */
    #[Optional]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $filterConnectionNameContains = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        null !== $filterConnectionNameContains && $self['filterConnectionNameContains'] = $filterConnectionNameContains;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter by connection name containing the given string.
     */
    public function withFilterConnectionNameContains(
        string $filterConnectionNameContains
    ): self {
        $self = clone $this;
        $self['filterConnectionNameContains'] = $filterConnectionNameContains;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sort by field (e.g., created_at, connection_name, active). Prefix with - for descending order.
     */
    public function withSort(string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
