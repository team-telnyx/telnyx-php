<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the metrics available in your organization, optionally filtered by test agent. Each metric scores one aspect of a conversation or scenario run.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\MetricsService::list()
 *
 * @phpstan-type MetricListParamsShape = array{
 *   agentID?: int|null, assistantID?: string|null
 * }
 */
final class MetricListParams implements BaseModel
{
    /** @use SdkModel<MetricListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter metrics attached to the specified test agent.
     */
    #[Optional]
    public ?int $agentID;

    /**
     * Filter metrics attached to the specified Telnyx assistant.
     */
    #[Optional]
    public ?string $assistantID;

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
        ?string $assistantID = null
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $assistantID && $self['assistantID'] = $assistantID;

        return $self;
    }

    /**
     * Filter metrics attached to the specified test agent.
     */
    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Filter metrics attached to the specified Telnyx assistant.
     */
    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }
}
