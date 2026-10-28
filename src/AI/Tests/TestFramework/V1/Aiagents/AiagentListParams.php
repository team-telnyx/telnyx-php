<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Aiagents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a paginated list of test agents in your organization. A test agent wraps the Telnyx AI assistant under test and drives simulated callers against it.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\AiagentsService::list()
 *
 * @phpstan-type AiagentListParamsShape = array{
 *   page?: int|null, pageSize?: int|null
 * }
 */
final class AiagentListParams implements BaseModel
{
    /** @use SdkModel<AiagentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number (1-based).
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of results per page.
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
    public static function with(?int $page = null, ?int $pageSize = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Page number (1-based).
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
