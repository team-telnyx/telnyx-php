<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AgentWebsiteContactShape = array{label: string, url: string}
 */
final class AgentWebsiteContact implements BaseModel
{
    /** @use SdkModel<AgentWebsiteContactShape> */
    use SdkModel;

    #[Required]
    public string $label;

    #[Required]
    public string $url;

    /**
     * `new AgentWebsiteContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentWebsiteContact::with(label: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentWebsiteContact)->withLabel(...)->withURL(...)
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
    public static function with(string $label, string $url): self
    {
        $self = new self;

        $self['label'] = $label;
        $self['url'] = $url;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
