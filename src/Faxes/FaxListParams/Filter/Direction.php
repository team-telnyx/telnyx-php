<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Direction filtering operations.
 *
 * @phpstan-type DirectionShape = array{eq?: string|null}
 */
final class Direction implements BaseModel
{
    /** @use SdkModel<DirectionShape> */
    use SdkModel;

    /**
     * The direction, inbound or outbound, for filtering faxes sent from this account.
     */
    #[Optional]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * The direction, inbound or outbound, for filtering faxes sent from this account.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
