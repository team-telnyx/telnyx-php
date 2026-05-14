<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response shape.
 *
 * Always carries ``rules`` (canonical).
 *
 * @phpstan-import-type RuleOutputShape from \Telnyx\AI\Assistants\CanaryDeploys\RuleOutput
 *
 * @phpstan-type CanaryDeployResponseShape = array{
 *   assistantID: string,
 *   createdAt: \DateTimeInterface,
 *   rules: list<RuleOutput|RuleOutputShape>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class CanaryDeployResponse implements BaseModel
{
    /** @use SdkModel<CanaryDeployResponseShape> */
    use SdkModel;

    #[Required('assistant_id')]
    public string $assistantID;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var list<RuleOutput> $rules */
    #[Required(list: RuleOutput::class)]
    public array $rules;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new CanaryDeployResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeployResponse::with(
     *   assistantID: ..., createdAt: ..., rules: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CanaryDeployResponse)
     *   ->withAssistantID(...)
     *   ->withCreatedAt(...)
     *   ->withRules(...)
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
     * @param list<RuleOutput|RuleOutputShape> $rules
     */
    public static function with(
        string $assistantID,
        \DateTimeInterface $createdAt,
        array $rules,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['assistantID'] = $assistantID;
        $self['createdAt'] = $createdAt;
        $self['rules'] = $rules;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<RuleOutput|RuleOutputShape> $rules
     */
    public function withRules(array $rules): self
    {
        $self = clone $this;
        $self['rules'] = $rules;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
