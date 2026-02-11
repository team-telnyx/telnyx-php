<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all missions for the organization.
 *
 * @see Telnyx\Services\AI\MissionsService::list()
 *
 * @phpstan-type MissionListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class MissionListParams implements BaseModel
{
    /** @use SdkModel<MissionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items per page.
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
     * Page number (1-based).
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
}
