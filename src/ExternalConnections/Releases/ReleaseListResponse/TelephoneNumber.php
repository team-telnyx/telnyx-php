<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephoneNumberShape = array{
 *   numberID?: string|null, phoneNumber?: string|null
 * }
 */
final class TelephoneNumber implements BaseModel
{
    /** @use SdkModel<TelephoneNumberShape> */
    use SdkModel;

    /**
     * Phone number ID from the Telnyx API.
     */
    #[Optional('number_id')]
    public ?string $numberID;

    /**
     * Phone number in E164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

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
        ?string $numberID = null,
        ?string $phoneNumber = null
    ): self {
        $self = new self;

        null !== $numberID && $self['numberID'] = $numberID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Phone number ID from the Telnyx API.
     */
    public function withNumberID(string $numberID): self
    {
        $self = clone $this;
        $self['numberID'] = $numberID;

        return $self;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
