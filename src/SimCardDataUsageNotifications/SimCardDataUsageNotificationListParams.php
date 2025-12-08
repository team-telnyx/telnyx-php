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
 *   filter_sim_card_id_?: string, page_number_?: int, page_size_?: int
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
    public ?string $filter_sim_card_id_;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $page_number_;

    /**
     * The size of the page.
     */
    #[Optional]
    public ?int $page_size_;

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
        ?string $filter_sim_card_id_ = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
    ): self {
        $obj = new self;

        null !== $filter_sim_card_id_ && $obj['filter_sim_card_id_'] = $filter_sim_card_id_;
        null !== $page_number_ && $obj['page_number_'] = $page_number_;
        null !== $page_size_ && $obj['page_size_'] = $page_size_;

        return $obj;
    }

    /**
     * A valid SIM card ID.
     */
    public function withFilterSimCardID(string $filterSimCardID): self
    {
        $obj = clone $this;
        $obj['filter_sim_card_id_'] = $filterSimCardID;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number_'] = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size_'] = $pageSize;

        return $obj;
    }
}
