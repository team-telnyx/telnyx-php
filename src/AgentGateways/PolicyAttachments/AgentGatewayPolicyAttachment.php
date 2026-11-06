<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\PolicyAttachments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Where an instance applies a policy.
 *
 * @phpstan-type AgentGatewayPolicyAttachmentShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface|null,
 *   default: bool,
 *   models: list<string>,
 *   policy: string,
 *   priority: int|null,
 *   updatedAt: \DateTimeInterface|null,
 * }
 */
final class AgentGatewayPolicyAttachment implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyAttachmentShape> */
    use SdkModel;

    /**
     * The attachment's ID.
     */
    #[Required]
    public string $id;

    /**
     * When the attachment was created.
     */
    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * `true` applies the policy only to the requests no other attachment matches.
     */
    #[Required]
    public bool $default;

    /**
     * The models whose requests the policy applies to, by name. A name can use `*` as a wildcard. Empty applies the policy to every request.
     *
     * @var list<string> $models
     */
    #[Required(list: 'string')]
    public array $models;

    /**
     * The policy to apply, by name.
     */
    #[Required]
    public string $policy;

    /**
     * An attachment with a priority applies before the others.
     */
    #[Required]
    public ?int $priority;

    /**
     * When the attachment last changed.
     */
    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AgentGatewayPolicyAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayPolicyAttachment::with(
     *   id: ...,
     *   createdAt: ...,
     *   default: ...,
     *   models: ...,
     *   policy: ...,
     *   priority: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayPolicyAttachment)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDefault(...)
     *   ->withModels(...)
     *   ->withPolicy(...)
     *   ->withPriority(...)
     *   ->withUpdatedAt(...)
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
     * @param list<string> $models
     */
    public static function with(
        string $id,
        ?\DateTimeInterface $createdAt,
        string $policy,
        ?int $priority,
        ?\DateTimeInterface $updatedAt,
        bool $default = false,
        array $models = [],
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['default'] = $default;
        $self['models'] = $models;
        $self['policy'] = $policy;
        $self['priority'] = $priority;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The attachment's ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * When the attachment was created.
     */
    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * The policy to apply, by name.
     */
    public function withPolicy(string $policy): self
    {
        $self = clone $this;
        $self['policy'] = $policy;

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

    /**
     * When the attachment last changed.
     */
    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
