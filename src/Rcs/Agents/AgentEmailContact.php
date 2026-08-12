<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AgentEmailContactShape = array{address: string, label: string}
 */
final class AgentEmailContact implements BaseModel
{
    /** @use SdkModel<AgentEmailContactShape> */
    use SdkModel;

    #[Required]
    public string $address;

    #[Required]
    public string $label;

    /**
     * `new AgentEmailContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentEmailContact::with(address: ..., label: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentEmailContact)->withAddress(...)->withLabel(...)
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
    public static function with(string $address, string $label): self
    {
        $self = new self;

        $self['address'] = $address;
        $self['label'] = $label;

        return $self;
    }

    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
