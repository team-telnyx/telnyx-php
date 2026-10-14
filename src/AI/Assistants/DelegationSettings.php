<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\DelegationSettings\Mode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Splits the conversation between a frontend model that talks to the caller and a backend model that does the work. On the GPT-Live route the frontend model cannot call tools at all — when it needs something done it raises a delegation and waits. On the chat completion route the frontend keeps a single `delegate` tool that returns immediately, so the conversation carries on while the backend works. Either way the backend's answer is spoken as commentary or kept as silent context, depending on `speak_results`. Beta feature.
 *
 * @phpstan-import-type ExternalLlmShape from \Telnyx\AI\Assistants\ExternalLlm
 *
 * @phpstan-type DelegationSettingsShape = array{
 *   enabled?: bool|null,
 *   externalLlm?: null|ExternalLlm|ExternalLlmShape,
 *   instructions?: string|null,
 *   llmAPIKeyRef?: string|null,
 *   mode?: null|Mode|value-of<Mode>,
 *   model?: string|null,
 *   speakResults?: bool|null,
 * }
 */
final class DelegationSettings implements BaseModel
{
    /** @use SdkModel<DelegationSettingsShape> */
    use SdkModel;

    /**
     * Whether the assistant delegates work to a backend model. Defaults to `true`: a GPT-Live assistant with delegation disabled can hold a conversation but can never look anything up or run a tool.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Run the backend on your own OpenAI-compatible endpoint instead of a Telnyx-hosted model. As above, a raw `api_key` here is rejected — reference an integration secret with `external_llm.llm_api_key_ref` instead.
     */
    #[Optional('external_llm')]
    public ?ExternalLlm $externalLlm;

    /**
     * Extra instructions for the backend model, in addition to the assistant's own. Use this for the business rules the backend needs and the talking model does not.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Integration secret identifier for the backend model's API key. Required for models from providers other than Telnyx, OpenAI and Anthropic. A raw `api_key` is rejected rather than ignored, so that no plaintext credential is stored on the assistant.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * Who answers a delegation. `telnyx` runs the backend model on Telnyx with the assistant's own tools, MCP servers and observability. `client` relays the delegation to a server you host over the WebSocket configured in `websocket_settings`: Telnyx sends a `session.delegation.created` frame and waits for your `session.delegation.completed` answer. That answer is text only, since the socket offers no tool vocabulary. If no socket is connected the delegation is refused and the assistant tells the caller it cannot look things up right now. Defaults to `telnyx`.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * The backend model that answers delegations. Must be a model available for AI Assistants. When enabling `telnyx` delegation, explicitly set this field or `external_llm.model`; a configuration without either backend model is rejected. Only applies when `mode` is `telnyx`.
     */
    #[Optional]
    public ?string $model;

    /**
     * Whether the backend's answer is spoken to the caller. When `true` the result is appended as commentary and paraphrased aloud; when `false` it is kept as silent context that informs later answers without being read out. Defaults to `true`.
     */
    #[Optional('speak_results')]
    public ?bool $speakResults;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalLlm|ExternalLlmShape|null $externalLlm
     * @param Mode|value-of<Mode>|null $mode
     */
    public static function with(
        ?bool $enabled = null,
        ExternalLlm|array|null $externalLlm = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        Mode|string|null $mode = null,
        ?string $model = null,
        ?bool $speakResults = null,
    ): self {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;
        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $mode && $self['mode'] = $mode;
        null !== $model && $self['model'] = $model;
        null !== $speakResults && $self['speakResults'] = $speakResults;

        return $self;
    }

    /**
     * Whether the assistant delegates work to a backend model. Defaults to `true`: a GPT-Live assistant with delegation disabled can hold a conversation but can never look anything up or run a tool.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Run the backend on your own OpenAI-compatible endpoint instead of a Telnyx-hosted model. As above, a raw `api_key` here is rejected — reference an integration secret with `external_llm.llm_api_key_ref` instead.
     *
     * @param ExternalLlm|ExternalLlmShape $externalLlm
     */
    public function withExternalLlm(ExternalLlm|array $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * Extra instructions for the backend model, in addition to the assistant's own. Use this for the business rules the backend needs and the talking model does not.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Integration secret identifier for the backend model's API key. Required for models from providers other than Telnyx, OpenAI and Anthropic. A raw `api_key` is rejected rather than ignored, so that no plaintext credential is stored on the assistant.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * Who answers a delegation. `telnyx` runs the backend model on Telnyx with the assistant's own tools, MCP servers and observability. `client` relays the delegation to a server you host over the WebSocket configured in `websocket_settings`: Telnyx sends a `session.delegation.created` frame and waits for your `session.delegation.completed` answer. That answer is text only, since the socket offers no tool vocabulary. If no socket is connected the delegation is refused and the assistant tells the caller it cannot look things up right now. Defaults to `telnyx`.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * The backend model that answers delegations. Must be a model available for AI Assistants. When enabling `telnyx` delegation, explicitly set this field or `external_llm.model`; a configuration without either backend model is rejected. Only applies when `mode` is `telnyx`.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Whether the backend's answer is spoken to the caller. When `true` the result is appended as commentary and paraphrased aloud; when `false` it is kept as silent context that informs later answers without being read out. Defaults to `true`.
     */
    public function withSpeakResults(bool $speakResults): self
    {
        $self = clone $this;
        $self['speakResults'] = $speakResults;

        return $self;
    }
}
