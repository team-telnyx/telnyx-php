<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule\Serve\Rollout;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * What a rule serves when matched.
 *
 * Exactly one of:
 * - ``version_id`` — serve a specific version
 * - ``rollout`` — weighted random across versions; weights must sum to
 *   less than 100, with the leftover routing to the main version
 *
 * @phpstan-import-type RolloutShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule\Serve\Rollout
 *
 * @phpstan-type ServeShape = array{
 *   rollout?: list<Rollout|RolloutShape>|null, versionID?: string|null
 * }
 */
final class Serve implements BaseModel
{
    /** @use SdkModel<ServeShape> */
    use SdkModel;

    /** @var list<Rollout>|null $rollout */
    #[Optional(list: Rollout::class)]
    public ?array $rollout;

    #[Optional('version_id')]
    public ?string $versionID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Rollout|RolloutShape>|null $rollout
     */
    public static function with(
        ?array $rollout = null,
        ?string $versionID = null
    ): self {
        $self = new self;

        null !== $rollout && $self['rollout'] = $rollout;
        null !== $versionID && $self['versionID'] = $versionID;

        return $self;
    }

    /**
     * @param list<Rollout|RolloutShape> $rollout
     */
    public function withRollout(array $rollout): self
    {
        $self = clone $this;
        $self['rollout'] = $rollout;

        return $self;
    }

    public function withVersionID(string $versionID): self
    {
        $self = clone $this;
        $self['versionID'] = $versionID;

        return $self;
    }
}
