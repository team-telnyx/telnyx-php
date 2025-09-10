<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The phone numbers successfully updated.
 *
 * @phpstan-type successful_operation = array{
 *   id?: string|null, phoneNumber?: string|null
 * }
 */
final class SuccessfulOperation implements BaseModel
{
    /** @use SdkModel<successful_operation> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The phone number in e164 format.
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
        ?string $id = null,
        ?string $phoneNumber = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The phone number's ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
