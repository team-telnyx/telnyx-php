<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails;

use Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrail\Mode;
use Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrail\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AgentGatewayGuardrailShape = array{
 *   id: string,
 *   alwaysOn: bool,
 *   createdAt: \DateTimeInterface|null,
 *   modes: list<Mode|value-of<Mode>>,
 *   name: string,
 *   settings: array<string,mixed>,
 *   type: Type|value-of<Type>,
 *   updatedAt: \DateTimeInterface|null,
 * }
 */
final class AgentGatewayGuardrail implements BaseModel
{
    /** @use SdkModel<AgentGatewayGuardrailShape> */
    use SdkModel;

    /**
     * Identifies the guardrail.
     */
    #[Required]
    public string $id;

    /**
     * Whether it runs on every request.
     */
    #[Required('always_on')]
    public bool $alwaysOn;

    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * When the guardrail runs.
     *
     * @var list<value-of<Mode>> $modes
     */
    #[Required(list: Mode::class)]
    public array $modes;

    /**
     * What a request names in its `guardrails` field.
     */
    #[Required]
    public string $name;

    /**
     * The type's settings. `content_filter`: `patterns` (prebuilt patterns by name, such as `us_ssn` or `email`), `regexes`, `keywords`, and `categories` (such as `prompt_injection`), each with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only. Responses leave the secrets out.
     *
     * @var array<string,mixed> $settings
     */
    #[Required(map: 'mixed')]
    public array $settings;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AgentGatewayGuardrail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayGuardrail::with(
     *   id: ...,
     *   alwaysOn: ...,
     *   createdAt: ...,
     *   modes: ...,
     *   name: ...,
     *   settings: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayGuardrail)
     *   ->withID(...)
     *   ->withAlwaysOn(...)
     *   ->withCreatedAt(...)
     *   ->withModes(...)
     *   ->withName(...)
     *   ->withSettings(...)
     *   ->withType(...)
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
     * @param list<Mode|value-of<Mode>> $modes
     * @param array<string,mixed> $settings
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        bool $alwaysOn,
        ?\DateTimeInterface $createdAt,
        array $modes,
        string $name,
        array $settings,
        Type|string $type,
        ?\DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['alwaysOn'] = $alwaysOn;
        $self['createdAt'] = $createdAt;
        $self['modes'] = $modes;
        $self['name'] = $name;
        $self['settings'] = $settings;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the guardrail.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether it runs on every request.
     */
    public function withAlwaysOn(bool $alwaysOn): self
    {
        $self = clone $this;
        $self['alwaysOn'] = $alwaysOn;

        return $self;
    }

    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * When the guardrail runs.
     *
     * @param list<Mode|value-of<Mode>> $modes
     */
    public function withModes(array $modes): self
    {
        $self = clone $this;
        $self['modes'] = $modes;

        return $self;
    }

    /**
     * What a request names in its `guardrails` field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The type's settings. `content_filter`: `patterns` (prebuilt patterns by name, such as `us_ssn` or `email`), `regexes`, `keywords`, and `categories` (such as `prompt_injection`), each with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only. Responses leave the secrets out.
     *
     * @param array<string,mixed> $settings
     */
    public function withSettings(array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
