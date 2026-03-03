<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Cost;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Meta;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Root;

/**
 * @phpstan-import-type CostShape from \Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Cost
 * @phpstan-import-type MetaShape from \Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Meta
 * @phpstan-import-type RootShape from \Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Root
 *
 * @phpstan-type SessionAnalysisGetResponseShape = array{
 *   cost: Cost|CostShape,
 *   createdAt: \DateTimeInterface,
 *   meta: Meta|MetaShape,
 *   root: Root|RootShape,
 *   sessionID: string,
 *   status: string,
 *   completedAt?: \DateTimeInterface|null,
 * }
 */
final class SessionAnalysisGetResponse implements BaseModel
{
    /** @use SdkModel<SessionAnalysisGetResponseShape> */
    use SdkModel;

    #[Required]
    public Cost $cost;

    /**
     * When the session started.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public Meta $meta;

    #[Required]
    public Root $root;

    /**
     * Identifier for the analyzed session.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * Analysis status (e.g. "completed").
     */
    #[Required]
    public string $status;

    /**
     * When the session completed.
     */
    #[Optional('completed_at', nullable: true)]
    public ?\DateTimeInterface $completedAt;

    /**
     * `new SessionAnalysisGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionAnalysisGetResponse::with(
     *   cost: ..., createdAt: ..., meta: ..., root: ..., sessionID: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionAnalysisGetResponse)
     *   ->withCost(...)
     *   ->withCreatedAt(...)
     *   ->withMeta(...)
     *   ->withRoot(...)
     *   ->withSessionID(...)
     *   ->withStatus(...)
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
     * @param Root|RootShape $root
     */
    public static function with(
        Cost|array $cost,
        \DateTimeInterface $createdAt,
        Meta|array $meta,
        Root|array $root,
        string $sessionID,
        string $status,
        ?\DateTimeInterface $completedAt = null,
    ): self {
        $self = new self;

        $self['cost'] = $cost;
        $self['createdAt'] = $createdAt;
        $self['meta'] = $meta;
        $self['root'] = $root;
        $self['sessionID'] = $sessionID;
        $self['status'] = $status;

        null !== $completedAt && $self['completedAt'] = $completedAt;

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
     * When the session started.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * @param Root|RootShape $root
     */
    public function withRoot(Root|array $root): self
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

    /**
     * Analysis status (e.g. "completed").
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * When the session completed.
     */
    public function withCompletedAt(?\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }
}
