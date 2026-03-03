<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\SessionAnalysisGetResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{eventCount: int, products: list<string>}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Total number of events in the session tree.
     */
    #[Required('event_count')]
    public int $eventCount;

    /**
     * List of distinct products involved in the session.
     *
     * @var list<string> $products
     */
    #[Required(list: 'string')]
    public array $products;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(eventCount: ..., products: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withEventCount(...)->withProducts(...)
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
     * @param list<string> $products
     */
    public static function with(int $eventCount, array $products): self
    {
        $self = new self;

        $self['eventCount'] = $eventCount;
        $self['products'] = $products;

        return $self;
    }

    /**
     * Total number of events in the session tree.
     */
    public function withEventCount(int $eventCount): self
    {
        $self = clone $this;
        $self['eventCount'] = $eventCount;

        return $self;
    }

    /**
     * List of distinct products involved in the session.
     *
     * @param list<string> $products
     */
    public function withProducts(array $products): self
    {
        $self = clone $this;
        $self['products'] = $products;

        return $self;
    }
}
