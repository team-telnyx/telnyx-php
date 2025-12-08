<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta\Cursors;

/**
 * @phpstan-type MetaShape = array{
 *   cursors?: Cursors|null, next?: string|null, previous?: string|null
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Optional]
    public ?Cursors $cursors;

    /**
     * Path to next page.
     */
    #[Optional]
    public ?string $next;

    /**
     * Path to previous page.
     */
    #[Optional]
    public ?string $previous;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Cursors|array{after?: string|null, before?: string|null} $cursors
     */
    public static function with(
        Cursors|array|null $cursors = null,
        ?string $next = null,
        ?string $previous = null
    ): self {
        $obj = new self;

        null !== $cursors && $obj['cursors'] = $cursors;
        null !== $next && $obj['next'] = $next;
        null !== $previous && $obj['previous'] = $previous;

        return $obj;
    }

    /**
     * @param Cursors|array{after?: string|null, before?: string|null} $cursors
     */
    public function withCursors(Cursors|array $cursors): self
    {
        $obj = clone $this;
        $obj['cursors'] = $cursors;

        return $obj;
    }

    /**
     * Path to next page.
     */
    public function withNext(string $next): self
    {
        $obj = clone $this;
        $obj['next'] = $next;

        return $obj;
    }

    /**
     * Path to previous page.
     */
    public function withPrevious(string $previous): self
    {
        $obj = clone $this;
        $obj['previous'] = $previous;

        return $obj;
    }
}
