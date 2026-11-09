<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Teams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Changes a team's settings. A field left out stays as it is, and `null` clears it. `models: []` lifts the model restriction. Setting `blocked` to `true` makes the instance refuse every key in the team with `401`. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\TeamsService::update()
 *
 * @phpstan-type TeamUpdateParamsShape = array{
 *   instanceID: string,
 *   blocked?: bool|null,
 *   budgetResetsEvery?: string|null,
 *   maxBudget?: float|null,
 *   models?: list<string>|null,
 *   name?: string|null,
 *   requestsPerMinute?: int|null,
 *   tokensPerMinute?: int|null,
 * }
 */
final class TeamUpdateParams implements BaseModel
{
    /** @use SdkModel<TeamUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `true` makes the instance refuse every key in the team; `false` lets them through again.
     */
    #[Optional]
    public ?bool $blocked;

    /**
     * How often the spend resets.
     */
    #[Optional('budget_resets_every', nullable: true)]
    public ?string $budgetResetsEvery;

    /**
     * The most the team's keys may spend together, in USD.
     */
    #[Optional('max_budget', nullable: true)]
    public ?float $maxBudget;

    /**
     * The models the team's keys may use. `[]` allows every model.
     *
     * @var list<string>|null $models
     */
    #[Optional(list: 'string')]
    public ?array $models;

    /**
     * A label for people.
     */
    #[Optional]
    public ?string $name;

    /**
     * The most requests the team's keys may make per minute, together.
     */
    #[Optional('requests_per_minute', nullable: true)]
    public ?int $requestsPerMinute;

    /**
     * The most tokens the team's keys may use per minute, together.
     */
    #[Optional('tokens_per_minute', nullable: true)]
    public ?int $tokensPerMinute;

    /**
     * `new TeamUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TeamUpdateParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TeamUpdateParams)->withInstanceID(...)
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
     * @param list<string>|null $models
     */
    public static function with(
        string $instanceID,
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
        ?bool $blocked = null,
        ?array $models = null,
        ?string $name = null,
    ): self {
        $self = new self;

        $self['instanceID'] = $instanceID;

        null !== $blocked && $self['blocked'] = $blocked;
        Omitted::VALUE !== $budgetResetsEvery && $self['budgetResetsEvery'] = $budgetResetsEvery;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        null !== $models && $self['models'] = $models;
        null !== $name && $self['name'] = $name;
        Omitted::VALUE !== $requestsPerMinute && $self['requestsPerMinute'] = $requestsPerMinute;
        Omitted::VALUE !== $tokensPerMinute && $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

        return $self;
    }

    /**
     * `true` makes the instance refuse every key in the team; `false` lets them through again.
     */
    public function withBlocked(bool $blocked): self
    {
        $self = clone $this;
        $self['blocked'] = $blocked;

        return $self;
    }

    /**
     * How often the spend resets.
     */
    public function withBudgetResetsEvery(?string $budgetResetsEvery): self
    {
        $self = clone $this;
        $self['budgetResetsEvery'] = $budgetResetsEvery;

        return $self;
    }

    /**
     * The most the team's keys may spend together, in USD.
     */
    public function withMaxBudget(?float $maxBudget): self
    {
        $self = clone $this;
        $self['maxBudget'] = $maxBudget;

        return $self;
    }

    /**
     * The models the team's keys may use. `[]` allows every model.
     *
     * @param list<string> $models
     */
    public function withModels(array $models): self
    {
        $self = clone $this;
        $self['models'] = $models;

        return $self;
    }

    /**
     * A label for people.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The most requests the team's keys may make per minute, together.
     */
    public function withRequestsPerMinute(?int $requestsPerMinute): self
    {
        $self = clone $this;
        $self['requestsPerMinute'] = $requestsPerMinute;

        return $self;
    }

    /**
     * The most tokens the team's keys may use per minute, together.
     */
    public function withTokensPerMinute(?int $tokensPerMinute): self
    {
        $self = clone $this;
        $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }
}
