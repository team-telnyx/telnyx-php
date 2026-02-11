<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List recent runs across all missions.
 *
 * @see Telnyx\Services\AI\Missions\RunsService::listRuns()
 *
 * @phpstan-type RunListRunsParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null, status?: string|null
 * }
 */
final class RunListRunsParams implements BaseModel
{
    /** @use SdkModel<RunListRunsParamsShape> */
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

    #[Optional]
    public ?string $status;

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
        ?string $status = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $status && $self['status'] = $status;

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

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
