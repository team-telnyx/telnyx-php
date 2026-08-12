<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Replaces the collection's entire source set. The response `meta` reports which sources were added, retained, and removed.
 *
 * @see Telnyx\Services\AI\Collections\SourcesService::replace()
 *
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 *
 * @phpstan-type SourceReplaceParamsShape = array{
 *   sources: list<SourceRequest|SourceRequestShape>
 * }
 */
final class SourceReplaceParams implements BaseModel
{
    /** @use SdkModel<SourceReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SourceRequest> $sources */
    #[Required(list: SourceRequest::class)]
    public array $sources;

    /**
     * `new SourceReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceReplaceParams::with(sources: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceReplaceParams)->withSources(...)
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
     * @param list<SourceRequest|SourceRequestShape> $sources
     */
    public static function with(array $sources): self
    {
        $self = new self;

        $self['sources'] = $sources;

        return $self;
    }

    /**
     * @param list<SourceRequest|SourceRequestShape> $sources
     */
    public function withSources(array $sources): self
    {
        $self = clone $this;
        $self['sources'] = $sources;

        return $self;
    }
}
