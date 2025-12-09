<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\Refer\Refer;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetShape = array{
 *   name: string,
 *   sipAddress: string,
 *   sipAuthPassword?: string|null,
 *   sipAuthUsername?: string|null,
 * }
 */
final class Target implements BaseModel
{
    /** @use SdkModel<TargetShape> */
    use SdkModel;

    /**
     * The name of the target.
     */
    #[Required]
    public string $name;

    /**
     * The SIP URI to which the call will be referred.
     */
    #[Required('sip_address')]
    public string $sipAddress;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Optional('sip_auth_password')]
    public ?string $sipAuthPassword;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Optional('sip_auth_username')]
    public ?string $sipAuthUsername;

    /**
     * `new Target()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Target::with(name: ..., sipAddress: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Target)->withName(...)->withSipAddress(...)
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
    public static function with(
        string $name,
        string $sipAddress,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['sipAddress'] = $sipAddress;

        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The SIP URI to which the call will be referred.
     */
    public function withSipAddress(string $sipAddress): self
    {
        $self = clone $this;
        $self['sipAddress'] = $sipAddress;

        return $self;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $self = clone $this;
        $self['sipAuthPassword'] = $sipAuthPassword;

        return $self;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $self = clone $this;
        $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }
}
