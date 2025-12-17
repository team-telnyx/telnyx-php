<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsSuggestion\Action\ViewLocationAction\LatLong;

/**
 * Opens the user's default map app and selects the agent-specified location.
 *
 * @phpstan-import-type LatLongShape from \Telnyx\Messages\RcsSuggestion\Action\ViewLocationAction\LatLong
 *
 * @phpstan-type ViewLocationActionShape = array{
 *   label?: string|null, latLong?: null|LatLong|LatLongShape, query?: string|null
 * }
 */
final class ViewLocationAction implements BaseModel
{
    /** @use SdkModel<ViewLocationActionShape> */
    use SdkModel;

    /**
     * The label of the pin dropped.
     */
    #[Optional]
    public ?string $label;

    #[Optional('lat_long')]
    public ?LatLong $latLong;

    /**
     * query string (Android only).
     */
    #[Optional]
    public ?string $query;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param LatLongShape $latLong
     */
    public static function with(
        ?string $label = null,
        LatLong|array|null $latLong = null,
        ?string $query = null
    ): self {
        $self = new self;

        null !== $label && $self['label'] = $label;
        null !== $latLong && $self['latLong'] = $latLong;
        null !== $query && $self['query'] = $query;

        return $self;
    }

    /**
     * The label of the pin dropped.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * @param LatLongShape $latLong
     */
    public function withLatLong(LatLong|array $latLong): self
    {
        $self = clone $this;
        $self['latLong'] = $latLong;

        return $self;
    }

    /**
     * query string (Android only).
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
