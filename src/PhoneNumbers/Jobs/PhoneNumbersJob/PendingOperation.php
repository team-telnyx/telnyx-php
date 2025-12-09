<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The phone numbers pending confirmation on update results. Entries in this list are transient, and will be moved to either successful_operations or failed_operations once the processing is done.
 *
 * @phpstan-type PendingOperationShape = array{
 *   id?: string|null, phoneNumber?: string|null
 * }
 */
final class PendingOperation implements BaseModel
{
    /** @use SdkModel<PendingOperationShape> */
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The phone number's ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
