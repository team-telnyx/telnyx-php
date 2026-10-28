<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a paginated list of evaluator scenarios in your organization, optionally filtered by test agent or tags.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::list()
 *
 * @phpstan-type ScenarioListParamsShape = array{
 *   agentID?: int|null,
 *   assistantID?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   tags?: string|null,
 * }
 */
final class ScenarioListParams implements BaseModel
{
    /** @use SdkModel<ScenarioListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter scenarios belonging to the specified test agent.
     */
    #[Optional]
    public ?int $agentID;

    /**
     * Filter scenarios belonging to the specified Telnyx assistant.
     */
    #[Optional]
    public ?string $assistantID;

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
     * Filter scenarios by a comma-separated list of tags.
     */
    #[Optional]
    public ?string $tags;

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
        ?string $assistantID = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $tags = null,
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $assistantID && $self['assistantID'] = $assistantID;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * Filter scenarios belonging to the specified test agent.
     */
    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Filter scenarios belonging to the specified Telnyx assistant.
     */
    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

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
     * Filter scenarios by a comma-separated list of tags.
     */
    public function withTags(string $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
