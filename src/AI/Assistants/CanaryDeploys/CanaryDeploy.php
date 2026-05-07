<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeploy\Rule;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create/update request body. Accepts:
 * - ``rules`` — canonical ordered list of routing rules
 *
 * @phpstan-import-type RuleShape from \Telnyx\AI\Assistants\CanaryDeploys\CanaryDeploy\Rule
 *
 * @phpstan-type CanaryDeployShape = array{rules?: list<Rule|RuleShape>|null}
 */
final class CanaryDeploy implements BaseModel
{
    /** @use SdkModel<CanaryDeployShape> */
    use SdkModel;

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
