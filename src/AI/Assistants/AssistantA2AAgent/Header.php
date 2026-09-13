<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantA2AAgent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A header sent when fetching an A2A agent's card and on every call made to that agent.
 *
 * @phpstan-type HeaderShape = array{name: string, value: string}
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    /**
     * HTTP header name. May only contain alphanumeric characters, hyphens, and underscores, or a `{{dynamic_variable}}` placeholder surrounded by those characters.
     */
    #[Required]
    public string $name;

    /**
     * Header value, stored exactly as written. It may be a literal, a `{{dynamic_variable}}`, or an `{{#integration_secret}}identifier{{/integration_secret}}` section that resolves to a stored integration secret when the conversation starts. Control characters are not allowed. The encrypted `{{variable | encryption_secret_ref}}` form used for per-caller credentials is not resolved here and is rejected when the assistant is saved.
     */
    #[Required]
    public string $value;

    /**
     * `new Header()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Header::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Header)->withName(...)->withValue(...)
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
     */
    public static function with(string $name, string $value): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    /**
     * HTTP header name. May only contain alphanumeric characters, hyphens, and underscores, or a `{{dynamic_variable}}` placeholder surrounded by those characters.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Header value, stored exactly as written. It may be a literal, a `{{dynamic_variable}}`, or an `{{#integration_secret}}identifier{{/integration_secret}}` section that resolves to a stored integration secret when the conversation starts. Control characters are not allowed. The encrypted `{{variable | encryption_secret_ref}}` form used for per-caller credentials is not resolved here and is rejected when the assistant is saved.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
