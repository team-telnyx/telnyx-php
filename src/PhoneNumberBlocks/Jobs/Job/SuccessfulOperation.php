<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\Job;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The phone numbers successfully updated.
 *
 * @phpstan-type SuccessfulOperationShape = array{
 *   id?: string|null, phone_number?: string|null
 * }
 */
final class SuccessfulOperation implements BaseModel
{
    /** @use SdkModel<SuccessfulOperationShape> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The phone number in e164 format.
     */
    #[Api(optional: true)]
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
        ?string $id = null,
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

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
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
