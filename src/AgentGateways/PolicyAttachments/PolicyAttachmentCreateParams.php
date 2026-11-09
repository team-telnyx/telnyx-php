<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\PolicyAttachments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Applies a policy to every request, or to the requests for the models named. It applies from the next request on.
 *
 * @see Telnyx\Services\AgentGateways\PolicyAttachmentsService::create()
 *
 * @phpstan-type PolicyAttachmentCreateParamsShape = array{
 *   policy: string,
 *   default?: bool|null,
 *   models?: list<string>|null,
 *   priority?: int|null,
 * }
 */
final class PolicyAttachmentCreateParams implements BaseModel
{
    /** @use SdkModel<PolicyAttachmentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The policy to apply, by name.
     */
    #[Required]
    public string $policy;

    /**
     * `true` applies the policy only to the requests no other attachment matches.
     */
    #[Optional]
    public ?bool $default;

    /**
     * The models whose requests the policy applies to, by name. A name can use `*` as a wildcard. Empty applies the policy to every request.
     *
     * @var list<string>|null $models
     */
    #[Optional(list: 'string')]
    public ?array $models;

    /**
     * An attachment with a priority applies before the others.
     */
    #[Optional(nullable: true)]
    public ?int $priority;

    /**
     * `new PolicyAttachmentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyAttachmentCreateParams::with(policy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyAttachmentCreateParams)->withPolicy(...)
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
        string $policy,
        int|Omitted|null $priority = Omitted::VALUE,
        ?bool $default = null,
        ?array $models = null,
    ): self {
        $self = new self;

        $self['policy'] = $policy;

        null !== $default && $self['default'] = $default;
        null !== $models && $self['models'] = $models;
        Omitted::VALUE !== $priority && $self['priority'] = $priority;

        return $self;
    }

    /**
     * The policy to apply, by name.
     */
    public function withPolicy(string $policy): self
    {
        $self = clone $this;
        $self['policy'] = $policy;

        return $self;
    }

    /**
     * `true` applies the policy only to the requests no other attachment matches.
     */
    public function withDefault(bool $default): self
    {
        $self = clone $this;
        $self['default'] = $default;

        return $self;
    }

    /**
     * The models whose requests the policy applies to, by name. A name can use `*` as a wildcard. Empty applies the policy to every request.
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
     * An attachment with a priority applies before the others.
     */
    public function withPriority(?int $priority): self
    {
        $self = clone $this;
        $self['priority'] = $priority;

        return $self;
    }
}
