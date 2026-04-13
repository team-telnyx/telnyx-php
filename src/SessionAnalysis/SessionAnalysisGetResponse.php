<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Cost;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Meta;

/**
 * @phpstan-import-type CostShape from \Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Cost
 * @phpstan-import-type MetaShape from \Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Meta
 * @phpstan-import-type EventNodeShape from \Telnyx\SessionAnalysis\EventNode
 *
 * @phpstan-type SessionAnalysisGetResponseShape = array{
 *   cost: Cost|CostShape,
 *   meta: Meta|MetaShape,
 *   root: EventNode|EventNodeShape,
 *   sessionID: string,
 * }
 */
final class SessionAnalysisGetResponse implements BaseModel
{
    /** @use SdkModel<SessionAnalysisGetResponseShape> */
    use SdkModel;

    #[Required]
    public Cost $cost;

    #[Required]
    public Meta $meta;

    #[Required]
    public EventNode $root;

    /**
     * Identifier for the analyzed session.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * `new SessionAnalysisGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionAnalysisGetResponse::with(
     *   cost: ..., meta: ..., root: ..., sessionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionAnalysisGetResponse)
     *   ->withCost(...)
     *   ->withMeta(...)
     *   ->withRoot(...)
     *   ->withSessionID(...)
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
     * @param Cost|CostShape $cost
     * @param Meta|MetaShape $meta
     * @param EventNode|EventNodeShape $root
     */
    public static function with(
        Cost|array $cost,
        Meta|array $meta,
        EventNode|array $root,
        string $sessionID
    ): self {
        $self = new self;

        $self['cost'] = $cost;
        $self['meta'] = $meta;
        $self['root'] = $root;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * @param Cost|CostShape $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param EventNode|EventNodeShape $root
     */
    public function withRoot(EventNode|array $root): self
    {
        $self = clone $this;
        $self['root'] = $root;

        return $self;
    }

    /**
     * Identifier for the analyzed session.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
