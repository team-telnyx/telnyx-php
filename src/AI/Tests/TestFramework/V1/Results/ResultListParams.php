<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a paginated list of test run batches in your organization, optionally filtered by test agent, search text, or scenarios.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ResultsService::list()
 *
 * @phpstan-type ResultListParamsShape = array{
 *   agentID?: int|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   scenarios?: string|null,
 *   search?: string|null,
 * }
 */
final class ResultListParams implements BaseModel
{
    /** @use SdkModel<ResultListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter results belonging to the specified test agent.
     */
    #[Optional]
    public ?int $agentID;

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

    /**
     * Filter results by a comma-separated list of scenario IDs.
     */
    #[Optional]
    public ?string $scenarios;

    /**
     * Filter results by a search string.
     */
    #[Optional]
    public ?string $search;

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
        ?int $agentID = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $scenarios = null,
        ?string $search = null,
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $scenarios && $self['scenarios'] = $scenarios;
        null !== $search && $self['search'] = $search;

        return $self;
    }

    /**
     * Filter results belonging to the specified test agent.
     */
    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

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

    /**
     * Filter results by a comma-separated list of scenario IDs.
     */
    public function withScenarios(string $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

        return $self;
    }

    /**
     * Filter results by a search string.
     */
    public function withSearch(string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }
}
