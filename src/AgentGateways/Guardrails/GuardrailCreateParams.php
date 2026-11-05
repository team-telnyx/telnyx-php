<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails;

use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams\Mode;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Adds a check the instance runs on model and tool requests. It runs on every request when `always_on`, and otherwise on the requests that name it in `guardrails`. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\GuardrailsService::create()
 *
 * @phpstan-type GuardrailCreateParamsShape = array{
 *   modes: list<Mode|value-of<Mode>>,
 *   name: string,
 *   type: Type|value-of<Type>,
 *   alwaysOn?: bool|null,
 *   settings?: mixed,
 * }
 */
final class GuardrailCreateParams implements BaseModel
{
    /** @use SdkModel<GuardrailCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * When the guardrail runs. Each type runs in some modes only.
     *
     * @var list<value-of<Mode>> $modes
     */
    #[Required(list: Mode::class)]
    public array $modes;

    /**
     * A name, unique on the instance. A request names it in its `guardrails` field.
     */
    #[Required]
    public string $name;

    /**
     * The kind of check. It cannot change after create.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `true` runs the guardrail on every request, and a request cannot turn it off. `false` runs it on the requests that name it.
     */
    #[Optional('always_on')]
    public ?bool $alwaysOn;

    /**
     * The type's settings. `content_filter`: `patterns` (prebuilt patterns by `name`, such as `us_ssn` or `email`), `regexes` (each a `name`, which tags masked matches, and a `pattern`), `keywords` (each a `keyword`), and `categories` (each a `name`), each entry with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only.
     */
    #[Optional]
    public mixed $settings;

    /**
     * `new GuardrailCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GuardrailCreateParams::with(modes: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GuardrailCreateParams)->withModes(...)->withName(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $modes,
        string $name,
        Type|string $type,
        ?bool $alwaysOn = null,
        mixed $settings = null,
    ): self {
        $self = new self;

        $self['modes'] = $modes;
        $self['name'] = $name;
        $self['type'] = $type;

        null !== $alwaysOn && $self['alwaysOn'] = $alwaysOn;
        null !== $settings && $self['settings'] = $settings;

        return $self;
    }

    /**
     * When the guardrail runs. Each type runs in some modes only.
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
     * A name, unique on the instance. A request names it in its `guardrails` field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The kind of check. It cannot change after create.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * `true` runs the guardrail on every request, and a request cannot turn it off. `false` runs it on the requests that name it.
     */
    public function withAlwaysOn(bool $alwaysOn): self
    {
        $self = clone $this;
        $self['alwaysOn'] = $alwaysOn;

        return $self;
    }

    /**
     * The type's settings. `content_filter`: `patterns` (prebuilt patterns by `name`, such as `us_ssn` or `email`), `regexes` (each a `name`, which tags masked matches, and a `pattern`), `keywords` (each a `keyword`), and `categories` (each a `name`), each entry with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only.
     */
    public function withSettings(mixed $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
