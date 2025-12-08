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
 *   email?: string|null, phone_number?: string|null
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
    #[Optional]
    public ?string $phone_number;

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
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $email && $obj['email'] = $email;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * The email address of the contact.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The phone number of the contact.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
