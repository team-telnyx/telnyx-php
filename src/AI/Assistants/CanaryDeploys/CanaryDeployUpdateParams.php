<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Endpoint to update a canary deploy configuration for an assistant.
 *
 * Updates the existing canary deploy configuration with new version IDs and percentages.
 *   All old versions and percentages are replaces by new ones from this request.
 *
 * @see Telnyx\Services\AI\Assistants\CanaryDeploysService::update()
 *
 * @phpstan-import-type RuleShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams\Rule
 *
 * @phpstan-type CanaryDeployUpdateParamsShape = array{
 *   rules?: list<Rule|RuleShape>|null
 * }
 */
final class CanaryDeployUpdateParams implements BaseModel
{
    /** @use SdkModel<CanaryDeployUpdateParamsShape> */
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
