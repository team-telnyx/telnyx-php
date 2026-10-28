<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionCreateParams\Condition;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember1Shape = array{
 *   kind: 'ref', observationID: string, ref: string
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    /** @var 'ref' $kind */
    #[Required]
    public string $kind = 'ref';

    #[Required('observation_id')]
    public string $observationID;

    #[Required]
    public string $ref;

    /**
     * `new UnionMember1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember1::with(observationID: ..., ref: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember1)->withObservationID(...)->withRef(...)
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
    public static function with(string $observationID, string $ref): self
    {
        $self = new self;

        $self['observationID'] = $observationID;
        $self['ref'] = $ref;

        return $self;
    }

    /**
     * @param 'ref' $kind
     */
    public function withKind(string $kind): self
    {
        $self = clone $this;
        $self['kind'] = $kind;

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
}
