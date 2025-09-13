<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\Job;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\Job\FailedOperation\Error;

/**
 * @phpstan-type failed_operation = array{
 *   id?: string, errors?: list<Error>, phoneNumber?: string
 * }
 */
final class FailedOperation implements BaseModel
{
    /** @use SdkModel<failed_operation> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var list<Error>|null $errors */
    #[Api(list: Error::class, optional: true)]
    public ?array $errors;

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
     *
     * @param list<Error> $errors
     */
    public static function with(
        ?string $id = null,
        ?array $errors = null,
        ?string $phoneNumber = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $errors && $obj->errors = $errors;
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
     * @param list<Error> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

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
