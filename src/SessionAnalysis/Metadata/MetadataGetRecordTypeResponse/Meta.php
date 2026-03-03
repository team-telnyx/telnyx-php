<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   maxRecommendedDepth: int,
 *   totalChildren: int,
 *   totalParents: int,
 *   totalSiblings: int,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('max_recommended_depth')]
    public int $maxRecommendedDepth;

    #[Required('total_children')]
    public int $totalChildren;

    #[Required('total_parents')]
    public int $totalParents;

    #[Required('total_siblings')]
    public int $totalSiblings;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(
     *   maxRecommendedDepth: ...,
     *   totalChildren: ...,
     *   totalParents: ...,
     *   totalSiblings: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)
     *   ->withMaxRecommendedDepth(...)
     *   ->withTotalChildren(...)
     *   ->withTotalParents(...)
     *   ->withTotalSiblings(...)
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
        int $maxRecommendedDepth,
        int $totalChildren,
        int $totalParents,
        int $totalSiblings,
    ): self {
        $self = new self;

        $self['maxRecommendedDepth'] = $maxRecommendedDepth;
        $self['totalChildren'] = $totalChildren;
        $self['totalParents'] = $totalParents;
        $self['totalSiblings'] = $totalSiblings;

        return $self;
    }

    public function withMaxRecommendedDepth(int $maxRecommendedDepth): self
    {
        $self = clone $this;
        $self['maxRecommendedDepth'] = $maxRecommendedDepth;

        return $self;
    }

    public function withTotalChildren(int $totalChildren): self
    {
        $self = clone $this;
        $self['totalChildren'] = $totalChildren;

        return $self;
    }

    public function withTotalParents(int $totalParents): self
    {
        $self = clone $this;
        $self['totalParents'] = $totalParents;

        return $self;
    }

    public function withTotalSiblings(int $totalSiblings): self
    {
        $self = clone $this;
        $self['totalSiblings'] = $totalSiblings;

        return $self;
    }
}
