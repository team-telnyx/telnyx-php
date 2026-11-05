<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails;

use Telnyx\AgentGateways\Guardrails\GuardrailUpdateParams\Mode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Changes a guardrail's `name`, `modes`, `always_on`, or `settings`. `settings` is replaced whole, secrets included. The `type` cannot change. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\GuardrailsService::update()
 *
 * @phpstan-type GuardrailUpdateParamsShape = array{
 *   instanceID: string,
 *   alwaysOn?: bool|null,
 *   modes?: list<Mode|value-of<Mode>>|null,
 *   name?: string|null,
 *   settings?: mixed,
 * }
 */
final class GuardrailUpdateParams implements BaseModel
{
    /** @use SdkModel<GuardrailUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `true` runs the guardrail on every request, and a request cannot turn it off. `false` runs it on the requests that name it.
     */
    #[Optional('always_on')]
    public ?bool $alwaysOn;

    /**
     * When the guardrail runs. Each type runs in some modes only.
     *
     * @var list<value-of<Mode>>|null $modes
     */
    #[Optional(list: Mode::class)]
    public ?array $modes;

    /**
     * A name, unique on the instance. A request names it in its `guardrails` field.
     */
    #[Optional]
    public ?string $name;

    /**
     * The type's settings. `content_filter`: `patterns` (prebuilt patterns by name, such as `us_ssn` or `email`), `regexes`, `keywords`, and `categories` (such as `prompt_injection`), each with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only.
     */
    #[Optional]
    public mixed $settings;

    /**
     * `new GuardrailUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GuardrailUpdateParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GuardrailUpdateParams)->withInstanceID(...)
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
     * @param list<Mode|value-of<Mode>>|null $modes
     */
    public static function with(
        string $instanceID,
        ?bool $alwaysOn = null,
        ?array $modes = null,
        ?string $name = null,
        mixed $settings = null,
    ): self {
        $self = new self;

        $self['instanceID'] = $instanceID;

        null !== $alwaysOn && $self['alwaysOn'] = $alwaysOn;
        null !== $modes && $self['modes'] = $modes;
        null !== $name && $self['name'] = $name;
        null !== $settings && $self['settings'] = $settings;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

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
     * The type's settings. `content_filter`: `patterns` (prebuilt patterns by name, such as `us_ssn` or `email`), `regexes`, `keywords`, and `categories` (such as `prompt_injection`), each with an `action` of `block` or `mask`. `tool_permission`: `rules` (`id`, `tool_name`, `tool_type`, `decision`, `argument_patterns`), a `default` decision, and `on_denied` (`block` or `rewrite`). `model_judge`: a `model` on the instance and weighted `criteria` (`name`, `description`, `weight`, the weights summing to 100). `custom_code`: `code` defining `apply_guardrail(inputs, request_data, input_type)`. `lakera`: `api_key`, `project_id`, `api_base`. `presidio`: `analyzer_url`, `anonymizer_url`, `entities` (entity name to `block` or `mask`), `language`. `bedrock`: `guardrail_id`, `version`, `region`, and `access_key_id` with `secret_access_key`, or `role_name`. `azure_content_safety`: `api_key`, `endpoint`, `severity` (0 to 7). Provider secrets are write-only.
     */
    public function withSettings(mixed $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
