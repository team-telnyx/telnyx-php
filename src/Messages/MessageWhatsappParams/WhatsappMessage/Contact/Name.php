<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Contact;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NameShape = array{
 *   formattedName: string,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   middleName?: string|null,
 *   prefix?: string|null,
 *   suffix?: string|null,
 * }
 */
final class Name implements BaseModel
{
    /** @use SdkModel<NameShape> */
    use SdkModel;

    /**
     * contact's full name as displayed in the message.
     */
    #[Required('formatted_name')]
    public string $formattedName;

    #[Optional('first_name')]
    public ?string $firstName;

    #[Optional('last_name')]
    public ?string $lastName;

    #[Optional('middle_name')]
    public ?string $middleName;

    #[Optional]
    public ?string $prefix;

    #[Optional]
    public ?string $suffix;

    /**
     * `new Name()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Name::with(formattedName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Name)->withFormattedName(...)
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
    public static function with(
        string $formattedName,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $middleName = null,
        ?string $prefix = null,
        ?string $suffix = null,
    ): self {
        $self = new self;

        $self['formattedName'] = $formattedName;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $middleName && $self['middleName'] = $middleName;
        null !== $prefix && $self['prefix'] = $prefix;
        null !== $suffix && $self['suffix'] = $suffix;

        return $self;
    }

    /**
     * contact's full name as displayed in the message.
     */
    public function withFormattedName(string $formattedName): self
    {
        $self = clone $this;
        $self['formattedName'] = $formattedName;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withMiddleName(string $middleName): self
    {
        $self = clone $this;
        $self['middleName'] = $middleName;

        return $self;
    }

    public function withPrefix(string $prefix): self
    {
        $self = clone $this;
        $self['prefix'] = $prefix;

        return $self;
    }

    public function withSuffix(string $suffix): self
    {
        $self = clone $this;
        $self['suffix'] = $suffix;

        return $self;
    }
}
