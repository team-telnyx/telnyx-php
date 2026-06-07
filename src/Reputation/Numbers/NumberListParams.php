<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Convenience alias for `GET /v2/enterprises/{enterprise_id}/reputation/numbers` that returns numbers across every enterprise you own. Useful when you don't want to look up the enterprise id first.
 *
 * @see Telnyx\Services\Reputation\NumbersService::list()
 *
 * @phpstan-type NumberListParamsShape = array{
 *   filterEnterpriseID?: string|null,
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
     * Filter by enterprise ID.
     */
    #[Optional]
    public ?string $filterEnterpriseID;

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
     * Items per page. Maximum 250; values above are clamped to 250.
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
        ?string $filterEnterpriseID = null,
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterEnterpriseID && $self['filterEnterpriseID'] = $filterEnterpriseID;
        null !== $filterPhoneNumberContains && $self['filterPhoneNumberContains'] = $filterPhoneNumberContains;
        null !== $filterPhoneNumberEq && $self['filterPhoneNumberEq'] = $filterPhoneNumberEq;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by enterprise ID.
     */
    public function withFilterEnterpriseID(string $filterEnterpriseID): self
    {
        $self = clone $this;
        $self['filterEnterpriseID'] = $filterEnterpriseID;

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
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
