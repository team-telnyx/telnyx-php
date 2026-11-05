<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Changes a key's settings without reissuing it. A field left out stays as it is, and `null` clears it. `models: []` lifts the model restriction. `expires_in` counts from now. Setting `blocked` to `true` makes the instance refuse the key with `401` while keeping its settings and spend; `false` lets it through again. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\KeysService::update()
 *
 * @phpstan-type KeyUpdateParamsShape = array{
 *   instanceID: string,
 *   blocked?: bool|null,
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
final class KeyUpdateParams implements BaseModel
{
    /** @use SdkModel<KeyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `true` makes the instance refuse the key; `false` lets it through again.
     */
    #[Optional]
    public ?bool $blocked;

    /**
     * How often the spend resets.
     */
    #[Optional('budget_resets_every', nullable: true)]
    public ?string $budgetResetsEvery;

    /**
     * How long from now until the key stops working.
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
     * The models the key may use. `[]` allows every model.
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
     * The most requests the key may make per minute.
     */
    #[Optional('requests_per_minute', nullable: true)]
    public ?int $requestsPerMinute;

    /**
     * Move the key to this team, or `null` to leave its team.
     */
    #[Optional('team_id', nullable: true)]
    public ?string $teamID;

    /**
     * The most tokens the key may use per minute.
     */
    #[Optional('tokens_per_minute', nullable: true)]
    public ?int $tokensPerMinute;

    /**
     * `new KeyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeyUpdateParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeyUpdateParams)->withInstanceID(...)
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
        string|Omitted|null $expiresIn = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        string|Omitted|null $teamID = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
        ?bool $blocked = null,
        ?array $models = null,
        ?string $name = null,
    ): self {
        $self = new self;

        $self['instanceID'] = $instanceID;

        null !== $blocked && $self['blocked'] = $blocked;
        Omitted::VALUE !== $budgetResetsEvery && $self['budgetResetsEvery'] = $budgetResetsEvery;
        Omitted::VALUE !== $expiresIn && $self['expiresIn'] = $expiresIn;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;
        null !== $models && $self['models'] = $models;
        null !== $name && $self['name'] = $name;
        Omitted::VALUE !== $requestsPerMinute && $self['requestsPerMinute'] = $requestsPerMinute;
        Omitted::VALUE !== $teamID && $self['teamID'] = $teamID;
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
     * `true` makes the instance refuse the key; `false` lets it through again.
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
     * How long from now until the key stops working.
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
     * The models the key may use. `[]` allows every model.
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
     * The most requests the key may make per minute.
     */
    public function withRequestsPerMinute(?int $requestsPerMinute): self
    {
        $self = clone $this;
        $self['requestsPerMinute'] = $requestsPerMinute;

        return $self;
    }

    /**
     * Move the key to this team, or `null` to leave its team.
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
