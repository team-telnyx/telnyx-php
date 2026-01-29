<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists a paginated collection of SIM card data usage notifications. It enables exploring the collection using specific filters.
 *
 * @see Telnyx\Services\SimCardDataUsageNotificationsService::list()
 *
 * @phpstan-type SimCardDataUsageNotificationListParamsShape = array{
 *   filterSimCardID?: string|null, pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class SimCardDataUsageNotificationListParams implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A valid SIM card ID.
     */
    #[Optional]
    public ?string $filterSimCardID;

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
        ?string $filterSimCardID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $filterSimCardID && $self['filterSimCardID'] = $filterSimCardID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * A valid SIM card ID.
     */
    public function withFilterSimCardID(string $filterSimCardID): self
    {
        $self = clone $this;
        $self['filterSimCardID'] = $filterSimCardID;

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
