<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\BrowserSessions\Actions\ClickAction\Wait;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Click an element identified by observation_id + ref.
 *
 * @phpstan-type ClickActionShape = array{
 *   observationID: string,
 *   ref: string,
 *   type: 'click',
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 *   timeoutMs?: int|null,
 *   wait?: null|Wait|value-of<Wait>,
 * }
 */
final class ClickAction implements BaseModel
{
    /** @use SdkModel<ClickActionShape> */
    use SdkModel;

    /** @var 'click' $type */
    #[Required]
    public string $type = 'click';

    #[Required('observation_id')]
    public string $observationID;

    #[Required]
    public string $ref;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /** @var value-of<Wait>|null $wait */
    #[Optional(enum: Wait::class)]
    public ?string $wait;

    /**
     * `new ClickAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClickAction::with(observationID: ..., ref: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClickAction)->withObservationID(...)->withRef(...)
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
     * @param Wait|value-of<Wait>|null $wait
     */
    public static function with(
        string $observationID,
        string $ref,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
        ?int $timeoutMs = null,
        Wait|string|null $wait = null,
    ): self {
        $self = new self;

        $self['observationID'] = $observationID;
        $self['ref'] = $ref;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;
        null !== $wait && $self['wait'] = $wait;

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

    /**
     * @param 'click' $type
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

    /**
     * @param Wait|value-of<Wait> $wait
     */
    public function withWait(Wait|string $wait): self
    {
        $self = clone $this;
        $self['wait'] = $wait;

        return $self;
    }
}
