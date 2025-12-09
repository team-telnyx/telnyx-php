<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\JobError;
use Telnyx\PhoneNumberBlocks\Jobs\JobError\Meta;
use Telnyx\PhoneNumberBlocks\Jobs\JobError\Source;

/**
 * @phpstan-type FailedOperationShape = array{
 *   id?: string|null, errors?: list<JobError>|null, phoneNumber?: string|null
 * }
 */
final class FailedOperation implements BaseModel
{
    /** @use SdkModel<FailedOperationShape> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Optional]
    public ?string $id;

    /** @var list<JobError>|null $errors */
    #[Optional(list: JobError::class)]
    public ?array $errors;

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
     *
     * @param list<JobError|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: Meta|null,
     *   source?: Source|null,
     * }> $errors
     */
    public static function with(
        ?string $id = null,
        ?array $errors = null,
        ?string $phoneNumber = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $errors && $obj['errors'] = $errors;
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
     * @param list<JobError|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: Meta|null,
     *   source?: Source|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

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
