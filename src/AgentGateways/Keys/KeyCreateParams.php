<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Issues a key on the instance. The key's value is in this response only. Every field is optional; a key without `models` may use every model the instance serves. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\KeysService::create()
 *
 * @phpstan-type KeyCreateParamsShape = array{
 *   budgetResetsEvery?: string|null,
 *   expiresIn?: string|null,
 *   maxBudget?: float|null,
 *   maxParallelRequests?: int|null,
 *   models?: list<string>|null,
 *   name?: string|null,
 *   requestsPerMinute?: int|null,
 *   teamID?: string|null,
 *   tokensPerMinute?: int|null,
 * }
 */
final class KeyCreateParams implements BaseModel
{
    /** @use SdkModel<KeyCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * How often the spend resets: a number and a unit, `s`, `m`, `h`, or `d`.
     */
    #[Optional('budget_resets_every', nullable: true)]
    public ?string $budgetResetsEvery;

    /**
     * How long until the key stops working: a number and a unit, `s`, `m`, `h`, or `d`.
     */
    #[Optional('expires_in', nullable: true)]
    public ?string $expiresIn;

    /**
     * The most the key may spend, in USD.
     */
    #[Optional('max_budget', nullable: true)]
    public ?float $maxBudget;

    /**
     * The most requests the key may have in flight at once.
     */
    #[Optional('max_parallel_requests', nullable: true)]
    public ?int $maxParallelRequests;

    /**
     * The models the key may use. Leave it out to allow every model.
     *
     * @var list<string>|null $models
     */
    #[Optional(list: 'string', nullable: true)]
    public ?array $models;

    /**
     * A label for people, unique on the instance.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * The most requests the key may make per minute.
     */
    #[Optional('requests_per_minute', nullable: true)]
    public ?int $requestsPerMinute;

    /**
     * A team on the instance. The key shares the team's model list, budget, and rate limits.
     */
    #[Optional('team_id', nullable: true)]
    public ?string $teamID;

    /**
     * The most tokens the key may use per minute.
     */
    #[Optional('tokens_per_minute', nullable: true)]
    public ?int $tokensPerMinute;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|Omitted|null $models
     */
    public static function with(
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        string|Omitted|null $expiresIn = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        array|Omitted|null $models = Omitted::VALUE,
        string|Omitted|null $name = Omitted::VALUE,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        string|Omitted|null $teamID = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $budgetResetsEvery && $self['budgetResetsEvery'] = $budgetResetsEvery;
        Omitted::VALUE !== $expiresIn && $self['expiresIn'] = $expiresIn;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;
        Omitted::VALUE !== $models && $self['models'] = $models;
        Omitted::VALUE !== $name && $self['name'] = $name;
        Omitted::VALUE !== $requestsPerMinute && $self['requestsPerMinute'] = $requestsPerMinute;
        Omitted::VALUE !== $teamID && $self['teamID'] = $teamID;
        Omitted::VALUE !== $tokensPerMinute && $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }

    /**
     * How often the spend resets: a number and a unit, `s`, `m`, `h`, or `d`.
     */
    public function withBudgetResetsEvery(?string $budgetResetsEvery): self
    {
        $self = clone $this;
        $self['budgetResetsEvery'] = $budgetResetsEvery;

        return $self;
    }

    /**
     * How long until the key stops working: a number and a unit, `s`, `m`, `h`, or `d`.
     */
    public function withExpiresIn(?string $expiresIn): self
    {
        $self = clone $this;
        $self['expiresIn'] = $expiresIn;

        return $self;
    }

    /**
     * The most the key may spend, in USD.
     */
    public function withMaxBudget(?float $maxBudget): self
    {
        $self = clone $this;
        $self['maxBudget'] = $maxBudget;

        return $self;
    }

    /**
     * The most requests the key may have in flight at once.
     */
    public function withMaxParallelRequests(?int $maxParallelRequests): self
    {
        $self = clone $this;
        $self['maxParallelRequests'] = $maxParallelRequests;

        return $self;
    }

    /**
     * The models the key may use. Leave it out to allow every model.
     *
     * @param list<string>|null $models
     */
    public function withModels(?array $models): self
    {
        $self = clone $this;
        $self['models'] = $models;

        return $self;
    }

    /**
     * A label for people, unique on the instance.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The most requests the key may make per minute.
     */
    public function withRequestsPerMinute(?int $requestsPerMinute): self
    {
        $self = clone $this;
        $self['requestsPerMinute'] = $requestsPerMinute;

        return $self;
    }

    /**
     * A team on the instance. The key shares the team's model list, budget, and rate limits.
     */
    public function withTeamID(?string $teamID): self
    {
        $self = clone $this;
        $self['teamID'] = $teamID;

        return $self;
    }

    /**
     * The most tokens the key may use per minute.
     */
    public function withTokensPerMinute(?int $tokensPerMinute): self
    {
        $self = clone $this;
        $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }
}
