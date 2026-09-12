<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\Payments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a paginated list of the authenticated user's x402 payment transactions, newest first. Organization sub-users must have read permission on transactions; without it the list is empty.
 *
 * @see Telnyx\Services\X402\CreditAccount\PaymentsService::list()
 *
 * @phpstan-type PaymentListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class PaymentListParams implements BaseModel
{
    /** @use SdkModel<PaymentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page.
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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
