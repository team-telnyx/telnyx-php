<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\CreatedAt;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\PhoneNumber;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt].
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAt|null,
 *   phoneNumber?: PhoneNumber|null,
 *   status?: Status|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    #[Optional('phone_number')]
    public ?PhoneNumber $phoneNumber;

    #[Optional]
    public ?Status $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $createdAt
     * @param PhoneNumber|array{eq?: string|null, in?: list<string>|null} $phoneNumber
     * @param Status|array{
     *   eq?: value-of<Eq>|null, in?: list<value-of<In>>|null
     * } $status
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        PhoneNumber|array|null $phoneNumber = null,
        Status|array|null $status = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param PhoneNumber|array{eq?: string|null, in?: list<string>|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param Status|array{
     *   eq?: value-of<Eq>|null, in?: list<value-of<In>>|null
     * } $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
