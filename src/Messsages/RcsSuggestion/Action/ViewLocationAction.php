<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction\LatLong;

/**
 * Opens the user's default map app and selects the agent-specified location.
 *
 * @phpstan-type view_location_action = array{
 *   label?: string|null, latLong?: LatLong|null, query?: string|null
 * }
 */
final class ViewLocationAction implements BaseModel
{
    /** @use SdkModel<view_location_action> */
    use SdkModel;

    /**
     * The label of the pin dropped.
     */
    #[Api(optional: true)]
    public ?string $label;

    #[Api('lat_long', optional: true)]
    public ?LatLong $latLong;

    /**
     * query string (Android only).
     */
    #[Api(optional: true)]
    public ?string $query;

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
        ?string $label = null,
        ?LatLong $latLong = null,
        ?string $query = null
    ): self {
        $obj = new self;

        null !== $label && $obj->label = $label;
        null !== $latLong && $obj->latLong = $latLong;
        null !== $query && $obj->query = $query;

        return $obj;
    }

    /**
     * The label of the pin dropped.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withLatLong(LatLong $latLong): self
    {
        $obj = clone $this;
        $obj->latLong = $latLong;

        return $obj;
    }

    /**
     * query string (Android only).
     */
    public function withQuery(string $query): self
    {
        $obj = clone $this;
        $obj->query = $query;

        return $obj;
    }
}
