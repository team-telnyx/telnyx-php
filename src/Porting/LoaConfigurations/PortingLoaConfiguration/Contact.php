<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The contact information of the company.
 *
 * @phpstan-type ContactShape = array{
 *   email?: string|null, phoneNumber?: string|null
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
    use SdkModel;

    /**
     * The email address of the contact.
     */
    #[Optional]
    public ?string $email;

    /**
     * The phone number of the contact.
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
        ?string $email = null,
        ?string $phoneNumber = null
    ): self {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The email address of the contact.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The phone number of the contact.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
