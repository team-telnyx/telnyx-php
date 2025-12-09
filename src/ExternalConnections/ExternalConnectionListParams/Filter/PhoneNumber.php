<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
 *
 * @phpstan-type PhoneNumberShape = array{contains?: string|null}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * If present, connections associated with the given phone_number will be returned. A full match is necessary with a e164 format.
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
     * If present, connections associated with the given phone_number will be returned. A full match is necessary with a e164 format.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }
}
