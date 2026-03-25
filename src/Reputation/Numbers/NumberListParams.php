<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all phone numbers enrolled in Number Reputation monitoring for your account. This is a simplified endpoint that does not require an `enterprise_id` — it returns numbers across all your enterprises.
 *
 * Supports pagination and filtering by phone number.
 *
 * @see Telnyx\Services\Reputation\NumbersService::list()
 *
 * @phpstan-type NumberListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null, phoneNumber?: string|null
 * }
 */
final class NumberListParams implements BaseModel
{
    /** @use SdkModel<NumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number (1-indexed).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Filter by specific phone number (E.164 format).
     */
    #[Optional]
    public ?string $phoneNumber;

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
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $phoneNumber = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Page number (1-indexed).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by specific phone number (E.164 format).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
