<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionResponse\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Full tree and refs are delivered only in the original successful POST response when completed within wait_seconds. GET polling and idempotent replays return metadata with an empty tree and refs plus ref_count. Submit a fresh observe action to obtain usable refs.
 *
 * @phpstan-type ObservationShape = array{
 *   observationID?: string|null,
 *   refCount?: int|null,
 *   refs?: array<string,mixed>|null,
 *   title?: string|null,
 *   tree?: string|null,
 *   truncated?: bool|null,
 *   url?: string|null,
 * }
 */
final class Observation implements BaseModel
{
    /** @use SdkModel<ObservationShape> */
    use SdkModel;

    #[Optional('observation_id')]
    public ?string $observationID;

    /**
     * Number of refs in the original observation, present on stored observation metadata.
     */
    #[Optional('ref_count')]
    public ?int $refCount;

    /** @var array<string,mixed>|null $refs */
    #[Optional(map: 'mixed')]
    public ?array $refs;

    #[Optional]
    public ?string $title;

    #[Optional]
    public ?string $tree;

    #[Optional]
    public ?bool $truncated;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $refs
     */
    public static function with(
        ?string $observationID = null,
        ?int $refCount = null,
        ?array $refs = null,
        ?string $title = null,
        ?string $tree = null,
        ?bool $truncated = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $observationID && $self['observationID'] = $observationID;
        null !== $refCount && $self['refCount'] = $refCount;
        null !== $refs && $self['refs'] = $refs;
        null !== $title && $self['title'] = $title;
        null !== $tree && $self['tree'] = $tree;
        null !== $truncated && $self['truncated'] = $truncated;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withObservationID(string $observationID): self
    {
        $self = clone $this;
        $self['observationID'] = $observationID;

        return $self;
    }

    /**
     * Number of refs in the original observation, present on stored observation metadata.
     */
    public function withRefCount(int $refCount): self
    {
        $self = clone $this;
        $self['refCount'] = $refCount;

        return $self;
    }

    /**
     * @param array<string,mixed> $refs
     */
    public function withRefs(array $refs): self
    {
        $self = clone $this;
        $self['refs'] = $refs;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withTree(string $tree): self
    {
        $self = clone $this;
        $self['tree'] = $tree;

        return $self;
    }

    public function withTruncated(bool $truncated): self
    {
        $self = clone $this;
        $self['truncated'] = $truncated;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
