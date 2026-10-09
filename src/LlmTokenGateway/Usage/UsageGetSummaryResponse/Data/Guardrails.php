<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent;

/**
 * Complete guardrail event counts and bounded recent findings for the same group and range.
 *
 * @phpstan-import-type RecentEventShape from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent
 *
 * @phpstan-type GuardrailsShape = array{
 *   blockedEvents: int,
 *   flaggedEvents: int,
 *   recentEvents: list<RecentEvent|RecentEventShape>,
 * }
 */
final class Guardrails implements BaseModel
{
    /** @use SdkModel<GuardrailsShape> */
    use SdkModel;

    /**
     * Total blocked guardrail events, not distinct requests.
     */
    #[Required('blocked_events')]
    public int $blockedEvents;

    /**
     * Total flagged guardrail events, not distinct requests.
     */
    #[Required('flagged_events')]
    public int $flaggedEvents;

    /**
     * Up to 20 newest privacy-safe guardrail events, ordered by creation time descending and event ID.
     *
     * @var list<RecentEvent> $recentEvents
     */
    #[Required('recent_events', list: RecentEvent::class)]
    public array $recentEvents;

    /**
     * `new Guardrails()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Guardrails::with(blockedEvents: ..., flaggedEvents: ..., recentEvents: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Guardrails)
     *   ->withBlockedEvents(...)
     *   ->withFlaggedEvents(...)
     *   ->withRecentEvents(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RecentEvent|RecentEventShape> $recentEvents
     */
    public static function with(
        int $blockedEvents,
        int $flaggedEvents,
        array $recentEvents
    ): self {
        $self = new self;

        $self['blockedEvents'] = $blockedEvents;
        $self['flaggedEvents'] = $flaggedEvents;
        $self['recentEvents'] = $recentEvents;

        return $self;
    }

    /**
     * Total blocked guardrail events, not distinct requests.
     */
    public function withBlockedEvents(int $blockedEvents): self
    {
        $self = clone $this;
        $self['blockedEvents'] = $blockedEvents;

        return $self;
    }

    /**
     * Total flagged guardrail events, not distinct requests.
     */
    public function withFlaggedEvents(int $flaggedEvents): self
    {
        $self = clone $this;
        $self['flaggedEvents'] = $flaggedEvents;

        return $self;
    }

    /**
     * Up to 20 newest privacy-safe guardrail events, ordered by creation time descending and event ID.
     *
     * @param list<RecentEvent|RecentEventShape> $recentEvents
     */
    public function withRecentEvents(array $recentEvents): self
    {
        $self = clone $this;
        $self['recentEvents'] = $recentEvents;

        return $self;
    }
}
