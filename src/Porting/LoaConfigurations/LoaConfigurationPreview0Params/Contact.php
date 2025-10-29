<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The contact information of the company.
 *
 * @phpstan-type ContactShape = array{email: string, phoneNumber: string}
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
    use SdkModel;

    /**
     * The email address of the contact.
     */
    #[Api]
    public string $email;

    /**
     * The phone number of the contact.
     */
    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * `new Contact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Contact::with(email: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Contact)->withEmail(...)->withPhoneNumber(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $email, string $phoneNumber): self
    {
        $obj = new self;

        $obj->email = $email;
        $obj->phoneNumber = $phoneNumber;

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
