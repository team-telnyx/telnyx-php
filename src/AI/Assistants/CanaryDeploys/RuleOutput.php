<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A targeting rule: ``match`` clauses (AND) gate ``serve``.
 *
 * An empty ``match`` is a catch-all (always fires).
 *
 * @phpstan-import-type ServeShape from \Telnyx\AI\Assistants\CanaryDeploys\Serve
 * @phpstan-import-type ClauseShape from \Telnyx\AI\Assistants\CanaryDeploys\Clause
 *
 * @phpstan-type RuleOutputShape = array{
 *   serve: Serve|ServeShape, match?: list<Clause|ClauseShape>|null
 * }
 */
final class RuleOutput implements BaseModel
{
    /** @use SdkModel<RuleOutputShape> */
    use SdkModel;

    /**
     * What a rule serves when matched.
     *
     * Exactly one of:
     * - ``version_id`` — serve a specific version
     * - ``rollout`` — weighted random across versions; weights must sum to
     *   less than 100, with the leftover routing to the main version
     */
    #[Required]
    public Serve $serve;

    /** @var list<Clause>|null $match */
    #[Optional(list: Clause::class)]
    public ?array $match;

    /**
     * `new RuleOutput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RuleOutput::with(serve: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RuleOutput)->withServe(...)
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
     * @param Serve|ServeShape $serve
     * @param list<Clause|ClauseShape>|null $match
     */
    public static function with(Serve|array $serve, ?array $match = null): self
    {
        $self = new self;

        $self['serve'] = $serve;

        null !== $match && $self['match'] = $match;

        return $self;
    }

    /**
     * What a rule serves when matched.
     *
     * Exactly one of:
     * - ``version_id`` — serve a specific version
     * - ``rollout`` — weighted random across versions; weights must sum to
     *   less than 100, with the leftover routing to the main version
     *
     * @param Serve|ServeShape $serve
     */
    public function withServe(Serve|array $serve): self
    {
        $self = clone $this;
        $self['serve'] = $serve;

        return $self;
    }

    /**
     * @param list<Clause|ClauseShape> $match
     */
    public function withMatch(array $match): self
    {
        $self = clone $this;
        $self['match'] = $match;

        return $self;
    }
}
