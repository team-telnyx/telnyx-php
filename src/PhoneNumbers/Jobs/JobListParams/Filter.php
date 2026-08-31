<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\JobListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\Status;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[phone_number], filter[phone_number][], filter[status][].
 *
 * @phpstan-import-type PhoneNumberVariants from \Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\PhoneNumber
 * @phpstan-import-type PhoneNumberShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\PhoneNumber
 *
 * @phpstan-type FilterShape = array{
 *   phoneNumber?: PhoneNumberShape|null,
 *   status?: list<Status|value-of<Status>>|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Returns jobs that targeted any of the supplied account-owned phone numbers. Values beginning with `+` must contain 1 to 20 digits after the plus sign. The 10-value limit is enforced before duplicate values are removed. Unmatched or non-account-owned identifiers return an empty result. Phone-number filtering must be enabled for the account.
     *
     * @var PhoneNumberVariants|null $phoneNumber
     */
    #[Optional('phone_number', union: PhoneNumber::class)]
    public string|array|null $phoneNumber;

    /**
     * Returns jobs with any of the supplied statuses. Use repeated `filter[status][]` parameters; scalar and comma-separated status values are not accepted.
     *
     * @var list<value-of<Status>>|null $status
     */
    #[Optional(list: Status::class)]
    public ?array $status;

    /**
     * Identifies the type of the background job.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberShape|null $phoneNumber
     * @param list<Status|value-of<Status>>|null $status
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string|array|null $phoneNumber = null,
        ?array $status = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Returns jobs that targeted any of the supplied account-owned phone numbers. Values beginning with `+` must contain 1 to 20 digits after the plus sign. The 10-value limit is enforced before duplicate values are removed. Unmatched or non-account-owned identifiers return an empty result. Phone-number filtering must be enabled for the account.
     *
     * @param PhoneNumberShape $phoneNumber
     */
    public function withPhoneNumber(string|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Returns jobs with any of the supplied statuses. Use repeated `filter[status][]` parameters; scalar and comma-separated status values are not accepted.
     *
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Identifies the type of the background job.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
