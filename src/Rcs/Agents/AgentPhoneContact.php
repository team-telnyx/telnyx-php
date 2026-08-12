<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AgentPhoneContactShape = array{label: string, number: string}
 */
final class AgentPhoneContact implements BaseModel
{
    /** @use SdkModel<AgentPhoneContactShape> */
    use SdkModel;

    #[Required]
    public string $label;

    #[Required]
    public string $number;

    /**
     * `new AgentPhoneContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentPhoneContact::with(label: ..., number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentPhoneContact)->withLabel(...)->withNumber(...)
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
    public static function with(string $label, string $number): self
    {
        $self = new self;

        $self['label'] = $label;
        $self['number'] = $number;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withNumber(string $number): self
    {
        $self = clone $this;
        $self['number'] = $number;

        return $self;
    }
}
