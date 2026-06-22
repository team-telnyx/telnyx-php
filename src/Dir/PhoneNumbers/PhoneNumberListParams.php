<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumberBatches\DirPhoneNumberStatus;

/**
 * List the phone numbers registered under a DIR. The enterprise is resolved server-side from the DIR id.
 *
 * @see Telnyx\Services\Dir\PhoneNumbersService::list()
 *
 * @phpstan-type PhoneNumberListParamsShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   status?: null|DirPhoneNumberStatus|value-of<DirPhoneNumberStatus>,
 * }
 */
final class PhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Filter by phone-number status.
     *
     * @var value-of<DirPhoneNumberStatus>|null $status
     */
    #[Optional(enum: DirPhoneNumberStatus::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DirPhoneNumberStatus|value-of<DirPhoneNumberStatus>|null $status
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        DirPhoneNumberStatus|string|null $status = null,
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by phone-number status.
     *
     * @param DirPhoneNumberStatus|value-of<DirPhoneNumberStatus> $status
     */
    public function withStatus(DirPhoneNumberStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
