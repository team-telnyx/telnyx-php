<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Type text into the element identified by observation_id + ref.
 *
 * @phpstan-type FillActionShape = array{
 *   observationID: string,
 *   ref: string,
 *   type: 'fill',
 *   value: string,
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 * }
 */
final class FillAction implements BaseModel
{
    /** @use SdkModel<FillActionShape> */
    use SdkModel;

    /** @var 'fill' $type */
    #[Required]
    public string $type = 'fill';

    #[Required('observation_id')]
    public string $observationID;

    #[Required]
    public string $ref;

    #[Required]
    public string $value;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    /**
     * `new FillAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FillAction::with(observationID: ..., ref: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FillAction)->withObservationID(...)->withRef(...)->withValue(...)
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
     */
    public static function with(
        string $observationID,
        string $ref,
        string $value,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
    ): self {
        $self = new self;

        $self['observationID'] = $observationID;
        $self['ref'] = $ref;
        $self['value'] = $value;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;

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
     * @param 'fill' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

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
}
