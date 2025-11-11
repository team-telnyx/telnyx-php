<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\Job;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\JobError;

/**
 * @phpstan-type FailedOperationShape = array{
 *   id?: string|null, errors?: list<JobError>|null, phone_number?: string|null
 * }
 */
final class FailedOperation implements BaseModel
{
    /** @use SdkModel<FailedOperationShape> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var list<JobError>|null $errors */
    #[Api(list: JobError::class, optional: true)]
    public ?array $errors;

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
     *
     * @param list<JobError> $errors
     */
    public static function with(
        ?string $id = null,
        ?array $errors = null,
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $errors && $obj->errors = $errors;
        null !== $phone_number && $obj->phone_number = $phone_number;

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
     * @param list<JobError> $errors
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
        $obj->phone_number = $phoneNumber;

        return $obj;
    }
}
