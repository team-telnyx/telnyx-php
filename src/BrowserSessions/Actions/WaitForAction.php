<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\Kind;
use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember0;
use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember1;
use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember2;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Wait for a condition before continuing.
 *
 * @phpstan-import-type ConditionVariants from \Telnyx\BrowserSessions\Actions\WaitForAction\Condition
 * @phpstan-import-type ConditionShape from \Telnyx\BrowserSessions\Actions\WaitForAction\Condition
 *
 * @phpstan-type WaitForActionShape = array{
 *   condition: ConditionShape,
 *   type: 'wait_for',
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 *   timeoutMs?: int|null,
 * }
 */
final class WaitForAction implements BaseModel
{
    /** @use SdkModel<WaitForActionShape> */
    use SdkModel;

    /** @var 'wait_for' $type */
    #[Required]
    public string $type = 'wait_for';

    /** @var ConditionVariants $condition */
    #[Required]
    public UnionMember0|UnionMember1|UnionMember2|Kind $condition;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /**
     * `new WaitForAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WaitForAction::with(condition: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WaitForAction)->withCondition(...)
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
     * @param ConditionShape $condition
     */
    public static function with(
        UnionMember0|array|UnionMember1|UnionMember2|Kind $condition,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
        ?int $timeoutMs = null,
    ): self {
        $self = new self;

        $self['condition'] = $condition;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    /**
     * @param ConditionShape $condition
     */
    public function withCondition(
        UnionMember0|array|UnionMember1|UnionMember2|Kind $condition
    ): self {
        $self = clone $this;
        $self['condition'] = $condition;

        return $self;
    }

    /**
     * @param 'wait_for' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIncludeObservation(bool $includeObservation): self
    {
        $self = clone $this;
        $self['includeObservation'] = $includeObservation;

        return $self;
    }

    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }
}
