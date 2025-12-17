<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\CreatedAt;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\PhoneNumber;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt].
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\CreatedAt
 * @phpstan-import-type PhoneNumberShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\PhoneNumber
 * @phpstan-import-type StatusShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   phoneNumber?: null|PhoneNumber|PhoneNumberShape,
 *   status?: null|Status|StatusShape,
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
     * @param CreatedAt|CreatedAtShape|null $createdAt
     * @param PhoneNumber|PhoneNumberShape|null $phoneNumber
     * @param Status|StatusShape|null $status
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
     * @param CreatedAt|CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param PhoneNumber|PhoneNumberShape $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param Status|StatusShape $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
