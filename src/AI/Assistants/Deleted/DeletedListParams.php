<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Deleted;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List the organization's soft-deleted assistants in the Recently Deleted list.
 *
 * Each entry includes `deleted_at` and `permanently_deleted_at`, the point after which the assistant is erased automatically and can no longer be restored.
 *
 * @see Telnyx\Services\AI\Assistants\DeletedService::list()
 *
 * @phpstan-type DeletedListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class DeletedListParams implements BaseModel
{
    /** @use SdkModel<DeletedListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number to retrieve (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items to return per page.
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
     * Page number to retrieve (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items to return per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
