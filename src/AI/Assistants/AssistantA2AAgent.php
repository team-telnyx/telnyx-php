<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantA2AAgent\Header;
use Telnyx\AI\Assistants\AssistantA2AAgent\Message;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A remote agent, reachable over the A2A (Agent2Agent) protocol, that an assistant can delegate to. Tools are not configured here: at the start of every conversation the agent's card is fetched and one tool is derived per skill the card advertises.
 *
 * @phpstan-import-type MessageVariants from \Telnyx\AI\Assistants\AssistantA2AAgent\Message
 * @phpstan-import-type HeaderShape from \Telnyx\AI\Assistants\AssistantA2AAgent\Header
 * @phpstan-import-type MessageShape from \Telnyx\AI\Assistants\AssistantA2AAgent\Message
 *
 * @phpstan-type AssistantA2AAgentShape = array{
 *   name: string,
 *   url: string,
 *   async?: bool|null,
 *   headers?: list<Header|HeaderShape>|null,
 *   messages?: list<MessageShape>|null,
 *   pollIntervalMs?: int|null,
 *   timeoutMs?: int|null,
 * }
 */
final class AssistantA2AAgent implements BaseModel
{
    /** @use SdkModel<AssistantA2AAgentShape> */
    use SdkModel;

    /**
     * Identifies the agent and seeds the names of the tools derived from its card (`a2a_<name>_<skill_id>`). Characters outside `[A-Za-z0-9_]` are replaced with `_` before the tool name is built, so two agents whose names differ only in punctuation collide and are rejected.
     */
    #[Required]
    public string $name;

    /**
     * The agent's base URL, or the URL of its agent card. At most 2,048 bytes once UTF-8 encoded. `/.well-known/agent-card.json` is appended to the path unless it already ends in `.json`. Must be an `http://` or `https://` URL for an externally reachable host: internal destinations (`localhost`, private and reserved IP ranges, `.local` domains) are rejected, and the hostname may not contain a `{{...}}` placeholder. Placeholders in the path are allowed.
     */
    #[Required]
    public string $url;

    /**
     * When `true`, the assistant hands the turn straight back to the model and the agent's answer is delivered into the conversation once it arrives, instead of the caller waiting for it in silence.
     */
    #[Optional]
    public ?bool $async;

    /**
     * Headers sent when fetching this agent's card and on every call made to it. Use them to authenticate to the agent.
     *
     * @var list<Header>|null $headers
     */
    #[Optional(list: Header::class)]
    public ?array $headers;

    /**
     * Filler messages spoken while a call to this agent is in progress. `request_start` messages are spoken immediately when the call begins. `request_response_delayed` messages are spoken after `timing_ms` has elapsed only if the agent has not answered yet. Filler messages are not used when `async` is `true`.
     *
     * @var list<MessageVariants>|null $messages
     */
    #[Optional(list: Message::class)]
    public ?array $messages;

    /**
     * How often, in milliseconds, to poll an agent task that has not finished yet. Defaults to 500.
     */
    #[Optional('poll_interval_ms')]
    public ?int $pollIntervalMs;

    /**
     * Total budget, in milliseconds, for one call to this agent, including any time spent polling a task that is still running. Omit to inherit the assistant's tool timeout.
     */
    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /**
     * `new AssistantA2AAgent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantA2AAgent::with(name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantA2AAgent)->withName(...)->withURL(...)
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
     * @param list<Header|HeaderShape>|null $headers
     * @param list<MessageShape>|null $messages
     */
    public static function with(
        string $name,
        string $url,
        ?bool $async = null,
        ?array $headers = null,
        ?array $messages = null,
        ?int $pollIntervalMs = null,
        ?int $timeoutMs = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['url'] = $url;

        null !== $async && $self['async'] = $async;
        null !== $headers && $self['headers'] = $headers;
        null !== $messages && $self['messages'] = $messages;
        null !== $pollIntervalMs && $self['pollIntervalMs'] = $pollIntervalMs;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    /**
     * Identifies the agent and seeds the names of the tools derived from its card (`a2a_<name>_<skill_id>`). Characters outside `[A-Za-z0-9_]` are replaced with `_` before the tool name is built, so two agents whose names differ only in punctuation collide and are rejected.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The agent's base URL, or the URL of its agent card. At most 2,048 bytes once UTF-8 encoded. `/.well-known/agent-card.json` is appended to the path unless it already ends in `.json`. Must be an `http://` or `https://` URL for an externally reachable host: internal destinations (`localhost`, private and reserved IP ranges, `.local` domains) are rejected, and the hostname may not contain a `{{...}}` placeholder. Placeholders in the path are allowed.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * When `true`, the assistant hands the turn straight back to the model and the agent's answer is delivered into the conversation once it arrives, instead of the caller waiting for it in silence.
     */
    public function withAsync(bool $async): self
    {
        $self = clone $this;
        $self['async'] = $async;

        return $self;
    }

    /**
     * Headers sent when fetching this agent's card and on every call made to it. Use them to authenticate to the agent.
     *
     * @param list<Header|HeaderShape> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * Filler messages spoken while a call to this agent is in progress. `request_start` messages are spoken immediately when the call begins. `request_response_delayed` messages are spoken after `timing_ms` has elapsed only if the agent has not answered yet. Filler messages are not used when `async` is `true`.
     *
     * @param list<MessageShape> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    /**
     * How often, in milliseconds, to poll an agent task that has not finished yet. Defaults to 500.
     */
    public function withPollIntervalMs(int $pollIntervalMs): self
    {
        $self = clone $this;
        $self['pollIntervalMs'] = $pollIntervalMs;

        return $self;
    }

    /**
     * Total budget, in milliseconds, for one call to this agent, including any time spent polling a task that is still running. Omit to inherit the assistant's tool timeout.
     */
    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }
}
