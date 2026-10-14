<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AIGatewayResourcesPageMetaShape = array{
 *   hasMore: bool, pageNumber: int, pageSize: int, snapshot: string
 * }
 */
final class AIGatewayResourcesPageMeta implements BaseModel
{
    /** @use SdkModel<AIGatewayResourcesPageMetaShape> */
    use SdkModel;

    #[Required('has_more')]
    public bool $hasMore;

    #[Required('page_number')]
    public int $pageNumber;

    #[Required('page_size')]
    public int $pageSize;

    #[Required]
    public string $snapshot;

    /**
     * `new AIGatewayResourcesPageMeta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AIGatewayResourcesPageMeta::with(
     *   hasMore: ..., pageNumber: ..., pageSize: ..., snapshot: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AIGatewayResourcesPageMeta)
     *   ->withHasMore(...)
     *   ->withPageNumber(...)
     *   ->withPageSize(...)
     *   ->withSnapshot(...)
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
     */
    public static function with(
        bool $hasMore,
        int $pageNumber,
        int $pageSize,
        string $snapshot
    ): self {
        $self = new self;

        $self['hasMore'] = $hasMore;
        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['snapshot'] = $snapshot;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withSnapshot(string $snapshot): self
    {
        $self = clone $this;
        $self['snapshot'] = $snapshot;

        return $self;
    }
}
