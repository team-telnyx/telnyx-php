<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The phone numbers successfully updated.
 *
 * @phpstan-type SuccessfulOperationShape = array{
 *   id?: string|null, phoneNumber?: string|null
 * }
 */
final class SuccessfulOperation implements BaseModel
{
    /** @use SdkModel<SuccessfulOperationShape> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * The phone number in e164 format.
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
        ?string $id = null,
        ?string $phoneNumber = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The phone number's ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
