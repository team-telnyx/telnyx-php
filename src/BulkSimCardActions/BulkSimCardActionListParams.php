<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions;

use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BulkSimCardActionListParams); // set properties as needed
 * $client->bulkSimCardActions->list(...$params->toArray());
 * ```
 * This API lists a paginated collection of bulk SIM card actions. A bulk SIM card action contains details about a collection of individual SIM card actions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->bulkSimCardActions->list(...$params->toArray());`
 *
 * @see Telnyx\BulkSimCardActions->list
 *
 * @phpstan-type bulk_sim_card_action_list_params = array{
 *   filterActionType?: FilterActionType|value-of<FilterActionType>,
 *   pageNumber?: int,
 *   pageSize?: int,
 * }
 */
final class BulkSimCardActionListParams implements BaseModel
{
    /** @use SdkModel<bulk_sim_card_action_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by action type.
     *
     * @var value-of<FilterActionType>|null $filterActionType
     */
    #[Api(enum: FilterActionType::class, optional: true)]
    public ?string $filterActionType;

    /**
     * The page number to load.
     */
    #[Api(optional: true)]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Api(optional: true)]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType
     */
    public static function with(
        FilterActionType|string|null $filterActionType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $obj = new self;

        null !== $filterActionType && $obj->filterActionType = $filterActionType instanceof FilterActionType ? $filterActionType->value : $filterActionType;
        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Filter by action type.
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType
     */
    public function withFilterActionType(
        FilterActionType|string $filterActionType
    ): self {
        $obj = clone $this;
        $obj->filterActionType = $filterActionType instanceof FilterActionType ? $filterActionType->value : $filterActionType;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }
}
