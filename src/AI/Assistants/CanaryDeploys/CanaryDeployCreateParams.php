<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Endpoint to create a canary deploy configuration for an assistant.
 *
 * Creates a new canary deploy configuration with multiple version IDs and their traffic
 * percentages for A/B testing or gradual rollouts of assistant versions.
 *
 * @see Telnyx\Services\AI\Assistants\CanaryDeploysService::create()
 *
 * @phpstan-import-type RuleInputShape from \Telnyx\AI\Assistants\CanaryDeploys\RuleInput
 *
 * @phpstan-type CanaryDeployCreateParamsShape = array{
 *   rules?: list<RuleInput|RuleInputShape>|null
 * }
 */
final class CanaryDeployCreateParams implements BaseModel
{
    /** @use SdkModel<CanaryDeployCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<RuleInput>|null $rules */
    #[Optional(list: RuleInput::class)]
    public ?array $rules;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RuleInput|RuleInputShape>|null $rules
     */
    public static function with(?array $rules = null): self
    {
        $self = new self;

        null !== $rules && $self['rules'] = $rules;

        return $self;
    }

    /**
     * @param list<RuleInput|RuleInputShape> $rules
     */
    public function withRules(array $rules): self
    {
        $self = clone $this;
        $self['rules'] = $rules;

        return $self;
    }
}
