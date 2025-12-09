<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter by connection name pattern matching.
 *
 * @phpstan-type ConnectionNameShape = array{contains?: string|null}
 */
final class ConnectionName implements BaseModel
{
    /** @use SdkModel<ConnectionNameShape> */
    use SdkModel;

    /**
     * Filter contains connection name. Requires at least three characters.
     */
    #[Optional]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;

        return $self;
    }

    /**
     * Filter contains connection name. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }
}
