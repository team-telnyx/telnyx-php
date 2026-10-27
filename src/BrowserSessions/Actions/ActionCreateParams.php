<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\BrowserSessions\Actions\ActionCreateParams\Action;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\Kind;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\UnionMember0;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\UnionMember1;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition\UnionMember2;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Key;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\Wait;
use Telnyx\BrowserSessions\Actions\ActionCreateParams\WaitUntil;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Executes a browser action on the session. Returns 200 if completed within wait_seconds, 202 if still in-flight.
 *
 * Action types: navigate, observe, click, fill, select, press, scroll, wait_for, screenshot, batch.
 *
 * @see Telnyx\Services\BrowserSessions\ActionsService::create()
 *
 * @phpstan-import-type ConditionVariants from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition
 * @phpstan-import-type ActionVariants from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Action
 * @phpstan-import-type ConditionShape from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition
 * @phpstan-import-type ActionShape from \Telnyx\BrowserSessions\Actions\ActionCreateParams\Action
 *
 * @phpstan-type ActionCreateParamsShape = array{
 *   type: 'batch',
 *   url: string,
 *   waitSeconds?: int|null,
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 *   waitUntil?: null|WaitUntil|value-of<WaitUntil>,
 *   observationID: string,
 *   ref: string,
 *   timeoutMs?: int|null,
 *   wait?: null|Wait|value-of<Wait>,
 *   value: string,
 *   key: Key|value-of<Key>,
 *   deltaX?: int|null,
 *   deltaY?: int|null,
 *   condition: ConditionShape,
 *   actions: list<ActionShape>,
 * }
 */
final class ActionCreateParams implements BaseModel
{
    /** @use SdkModel<ActionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var 'batch' $type */
    #[Required]
    public string $type = 'batch';

    #[Required]
    public string $url;

    /**
     * Maximum seconds the submission request waits for completion, not an execution timeout. If still queued or running, returns 202 without cancelling execution; poll the returned action ID.
     */
    #[Optional]
    public ?int $waitSeconds;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    /** @var value-of<WaitUntil>|null $waitUntil */
    #[Optional('wait_until', enum: WaitUntil::class)]
    public ?string $waitUntil;

    #[Required('observation_id')]
    public string $observationID;

    #[Required]
    public string $ref;

    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /** @var value-of<Wait>|null $wait */
    #[Optional(enum: Wait::class)]
    public ?string $wait;

    #[Required]
    public string $value;

    /** @var value-of<Key> $key */
    #[Required(enum: Key::class)]
    public string $key;

    #[Optional('delta_x')]
    public ?int $deltaX;

    #[Optional('delta_y')]
    public ?int $deltaY;

    /** @var ConditionVariants $condition */
    #[Required]
    public UnionMember0|UnionMember1|UnionMember2|Kind $condition;

    /** @var list<ActionVariants> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /**
     * `new ActionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCreateParams::with(
     *   url: ...,
     *   observationID: ...,
     *   ref: ...,
     *   value: ...,
     *   key: ...,
     *   condition: ...,
     *   actions: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCreateParams)
     *   ->withURL(...)
     *   ->withObservationID(...)
     *   ->withRef(...)
     *   ->withValue(...)
     *   ->withKey(...)
     *   ->withCondition(...)
     *   ->withActions(...)
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
     * @param Key|value-of<Key> $key
     * @param ConditionShape $condition
     * @param list<ActionShape> $actions
     * @param WaitUntil|value-of<WaitUntil>|null $waitUntil
     * @param Wait|value-of<Wait>|null $wait
     */
    public static function with(
        string $url,
        string $observationID,
        string $ref,
        string $value,
        Key|string $key,
        UnionMember0|array|UnionMember1|UnionMember2|Kind $condition,
        array $actions,
        ?int $waitSeconds = null,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
        WaitUntil|string|null $waitUntil = null,
        ?int $timeoutMs = null,
        Wait|string|null $wait = null,
        ?int $deltaX = null,
        ?int $deltaY = null,
    ): self {
        $self = new self;

        $self['url'] = $url;
        $self['observationID'] = $observationID;
        $self['ref'] = $ref;
        $self['value'] = $value;
        $self['key'] = $key;
        $self['condition'] = $condition;
        $self['actions'] = $actions;

        null !== $waitSeconds && $self['waitSeconds'] = $waitSeconds;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;
        null !== $waitUntil && $self['waitUntil'] = $waitUntil;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;
        null !== $wait && $self['wait'] = $wait;
        null !== $deltaX && $self['deltaX'] = $deltaX;
        null !== $deltaY && $self['deltaY'] = $deltaY;

        return $self;
    }

    /**
     * @param 'batch' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Maximum seconds the submission request waits for completion, not an execution timeout. If still queued or running, returns 202 without cancelling execution; poll the returned action ID.
     */
    public function withWaitSeconds(int $waitSeconds): self
    {
        $self = clone $this;
        $self['waitSeconds'] = $waitSeconds;

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

    /**
     * @param WaitUntil|value-of<WaitUntil> $waitUntil
     */
    public function withWaitUntil(WaitUntil|string $waitUntil): self
    {
        $self = clone $this;
        $self['waitUntil'] = $waitUntil;

        return $self;
    }

    public function withObservationID(string $observationID): self
    {
        $self = clone $this;
        $self['observationID'] = $observationID;

        return $self;
    }

    public function withRef(string $ref): self
    {
        $self = clone $this;
        $self['ref'] = $ref;

        return $self;
    }

    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    /**
     * @param Wait|value-of<Wait> $wait
     */
    public function withWait(Wait|string $wait): self
    {
        $self = clone $this;
        $self['wait'] = $wait;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * @param Key|value-of<Key> $key
     */
    public function withKey(Key|string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    public function withDeltaX(int $deltaX): self
    {
        $self = clone $this;
        $self['deltaX'] = $deltaX;

        return $self;
    }

    public function withDeltaY(int $deltaY): self
    {
        $self = clone $this;
        $self['deltaY'] = $deltaY;

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
     * @param list<ActionShape> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }
}
