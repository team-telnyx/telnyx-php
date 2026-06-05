<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule\Match_;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule\Serve;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A targeting rule: ``match`` clauses (AND) gate ``serve``.
 *
 * An empty ``match`` is a catch-all (always fires).
 *
 * @phpstan-import-type ServeShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule\Serve
 * @phpstan-import-type MatchShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule\Match_
 *
 * @phpstan-type RuleShape = array{
 *   serve: Serve|ServeShape, match?: list<Match_|MatchShape>|null
 * }
 */
final class Rule implements BaseModel
{
    /** @use SdkModel<RuleShape> */
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

    /** @var list<Match_>|null $match */
    #[Optional(list: Match_::class)]
    public ?array $match;

    /**
     * `new Rule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Rule::with(serve: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Rule)->withServe(...)
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
     * @param list<Match_|MatchShape>|null $match
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
     * @param list<Match_|MatchShape> $match
     */
    public function withMatch(array $match): self
    {
        $self = clone $this;
        $self['match'] = $match;

        return $self;
    }
}
