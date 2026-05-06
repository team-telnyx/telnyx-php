<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule;
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
 * @phpstan-import-type RuleShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams\Rule
 *
 * @phpstan-type CanaryDeployCreateParamsShape = array{
 *   rules?: list<Rule|RuleShape>|null
 * }
 */
final class CanaryDeployCreateParams implements BaseModel
{
    /** @use SdkModel<CanaryDeployCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<Rule>|null $rules */
    #[Optional(list: Rule::class)]
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
     * @param list<Rule|RuleShape>|null $rules
     */
    public static function with(?array $rules = null): self
    {
        $self = new self;

        null !== $rules && $self['rules'] = $rules;

        return $self;
    }

    /**
     * @param list<Rule|RuleShape> $rules
     */
    public function withRules(array $rules): self
    {
        $self = clone $this;
        $self['rules'] = $rules;

        return $self;
    }
}
