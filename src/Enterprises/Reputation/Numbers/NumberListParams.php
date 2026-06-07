<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Paginated list of phone numbers registered for reputation monitoring under this enterprise. The response includes the latest reputation snapshot per number where one has been collected.
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::list()
 *
 * @phpstan-type NumberListParamsShape = array{
 *   filterPhoneNumberContains?: string|null,
 *   filterPhoneNumberEq?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class NumberListParams implements BaseModel
{
    /** @use SdkModel<NumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Partial match on phone number. Must contain at least 5 digits.
     */
    #[Optional]
    public ?string $filterPhoneNumberContains;

    /**
     * Exact phone-number match (E.164).
     */
    #[Optional]
    public ?string $filterPhoneNumberEq;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Default 10. Maximum 250; values above are clamped to 250.
     */
    #[Optional]
    public ?int $pageSize;

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
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterPhoneNumberContains && $self['filterPhoneNumberContains'] = $filterPhoneNumberContains;
        null !== $filterPhoneNumberEq && $self['filterPhoneNumberEq'] = $filterPhoneNumberEq;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Partial match on phone number. Must contain at least 5 digits.
     */
    public function withFilterPhoneNumberContains(
        string $filterPhoneNumberContains
    ): self {
        $self = clone $this;
        $self['filterPhoneNumberContains'] = $filterPhoneNumberContains;

        return $self;
    }

    /**
     * Exact phone-number match (E.164).
     */
    public function withFilterPhoneNumberEq(string $filterPhoneNumberEq): self
    {
        $self = clone $this;
        $self['filterPhoneNumberEq'] = $filterPhoneNumberEq;

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
     * Items per page. Default 10. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
