<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateListParams\FilterCategory;

/**
 * List Whatsapp message templates.
 *
 * @see Telnyx\Services\Whatsapp\TemplatesService::list()
 *
 * @phpstan-type TemplateListParamsShape = array{
 *   filterCategory?: null|FilterCategory|value-of<FilterCategory>,
 *   filterSearch?: string|null,
 *   filterStatus?: string|null,
 *   filterWabaID?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class TemplateListParams implements BaseModel
{
    /** @use SdkModel<TemplateListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by category.
     *
     * @var value-of<FilterCategory>|null $filterCategory
     */
    #[Optional(enum: FilterCategory::class)]
    public ?string $filterCategory;

    /**
     * Search templates by name.
     */
    #[Optional]
    public ?string $filterSearch;

    /**
     * Filter by template status.
     */
    #[Optional]
    public ?string $filterStatus;

    /**
     * Filter by WABA ID.
     */
    #[Optional]
    public ?string $filterWabaID;

    #[Optional]
    public ?int $pageNumber;

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
     *
     * @param FilterCategory|value-of<FilterCategory>|null $filterCategory
     */
    public static function with(
        FilterCategory|string|null $filterCategory = null,
        ?string $filterSearch = null,
        ?string $filterStatus = null,
        ?string $filterWabaID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterCategory && $self['filterCategory'] = $filterCategory;
        null !== $filterSearch && $self['filterSearch'] = $filterSearch;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $filterWabaID && $self['filterWabaID'] = $filterWabaID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by category.
     *
     * @param FilterCategory|value-of<FilterCategory> $filterCategory
     */
    public function withFilterCategory(
        FilterCategory|string $filterCategory
    ): self {
        $self = clone $this;
        $self['filterCategory'] = $filterCategory;

        return $self;
    }

    /**
     * Search templates by name.
     */
    public function withFilterSearch(string $filterSearch): self
    {
        $self = clone $this;
        $self['filterSearch'] = $filterSearch;

        return $self;
    }

    /**
     * Filter by template status.
     */
    public function withFilterStatus(string $filterStatus): self
    {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

        return $self;
    }

    /**
     * Filter by WABA ID.
     */
    public function withFilterWabaID(string $filterWabaID): self
    {
        $self = clone $this;
        $self['filterWabaID'] = $filterWabaID;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
