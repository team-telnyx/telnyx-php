<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * To number filtering operations.
 *
 * @phpstan-type ToShape = array{eq?: string|null}
 */
final class To implements BaseModel
{
    /** @use SdkModel<ToShape> */
    use SdkModel;

    /**
     * The phone number, in E.164 format for filtering faxes sent to this number.
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
     * The phone number, in E.164 format for filtering faxes sent to this number.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
