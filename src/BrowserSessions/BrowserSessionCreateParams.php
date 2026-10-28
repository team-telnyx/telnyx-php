<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions;

use Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits;
use Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an isolated browser session with network access restricted to the domains you allow.
 *
 * @see Telnyx\Services\BrowserSessionsService::create()
 *
 * @phpstan-import-type PolicyShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Policy
 * @phpstan-import-type LimitsShape from \Telnyx\BrowserSessions\BrowserSessionCreateParams\Limits
 *
 * @phpstan-type BrowserSessionCreateParamsShape = array{
 *   policy: Policy|PolicyShape,
 *   idempotencyKey?: string|null,
 *   limits?: null|Limits|LimitsShape,
 *   metadata?: mixed,
 * }
 */
final class BrowserSessionCreateParams implements BaseModel
{
    /** @use SdkModel<BrowserSessionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Policy $policy;

    /**
     * Scoped to the organization. The same key and identical normalized policy, limits, and metadata replay the existing session (HTTP 201); a different request returns 409 idempotency_conflict. Replays do not restart terminal sessions.
     */
    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional]
    public ?Limits $limits;

    /**
     * Arbitrary key-value metadata.
     */
    #[Optional]
    public mixed $metadata;

    /**
     * `new BrowserSessionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrowserSessionCreateParams::with(policy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrowserSessionCreateParams)->withPolicy(...)
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
     * @param Policy|PolicyShape $policy
     * @param Limits|LimitsShape|null $limits
     */
    public static function with(
        Policy|array $policy,
        ?string $idempotencyKey = null,
        Limits|array|null $limits = null,
        mixed $metadata = null,
    ): self {
        $self = new self;

        $self['policy'] = $policy;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $limits && $self['limits'] = $limits;
        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param Policy|PolicyShape $policy
     */
    public function withPolicy(Policy|array $policy): self
    {
        $self = clone $this;
        $self['policy'] = $policy;

        return $self;
    }

    /**
     * Scoped to the organization. The same key and identical normalized policy, limits, and metadata replay the existing session (HTTP 201); a different request returns 409 idempotency_conflict. Replays do not restart terminal sessions.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * @param Limits|LimitsShape $limits
     */
    public function withLimits(Limits|array $limits): self
    {
        $self = clone $this;
        $self['limits'] = $limits;

        return $self;
    }

    /**
     * Arbitrary key-value metadata.
     */
    public function withMetadata(mixed $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
