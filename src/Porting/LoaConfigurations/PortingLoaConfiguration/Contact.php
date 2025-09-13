<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The contact information of the company.
 *
 * @phpstan-type contact_alias = array{email?: string, phoneNumber?: string}
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<contact_alias> */
    use SdkModel;

    /**
     * The email address of the contact.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * The phone number of the contact.
     */
    #[Api('phone_number', optional: true)]
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
        $obj = new self;

        null !== $email && $obj->email = $email;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The email address of the contact.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The phone number of the contact.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
