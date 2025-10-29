<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetShape = array{
 *   name: string,
 *   sipAddress: string,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 * }
 */
final class Target implements BaseModel
{
    /** @use SdkModel<TargetShape> */
    use SdkModel;

    /**
     * The name of the target.
     */
    #[Api]
    public string $name;

    /**
     * The SIP URI to which the call will be referred.
     */
    #[Api('sip_address')]
    public string $sipAddress;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Api('sip_auth_password', optional: true)]
    public ?string $sipAuthPassword;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Api('sip_auth_username', optional: true)]
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
        $obj = new self;

        $obj->name = $name;
        $obj->sipAddress = $sipAddress;

        null !== $sipAuthPassword && $obj->sipAuthPassword = $sipAuthPassword;
        null !== $sipAuthUsername && $obj->sipAuthUsername = $sipAuthUsername;

        return $obj;
    }

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The SIP URI to which the call will be referred.
     */
    public function withSipAddress(string $sipAddress): self
    {
        $obj = clone $this;
        $obj->sipAddress = $sipAddress;

        return $obj;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj->sipAuthPassword = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj->sipAuthUsername = $sipAuthUsername;

        return $obj;
    }
}
