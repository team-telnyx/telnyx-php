<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetShape = array{
 *   name: string,
 *   sip_address: string,
 *   sip_auth_password?: string|null,
 *   sip_auth_username?: string|null,
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
    #[Required]
    public string $sip_address;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Optional]
    public ?string $sip_auth_password;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Optional]
    public ?string $sip_auth_username;

    /**
     * `new Target()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Target::with(name: ..., sip_address: ...)
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
        string $sip_address,
        ?string $sip_auth_password = null,
        ?string $sip_auth_username = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;
        $obj['sip_address'] = $sip_address;

        null !== $sip_auth_password && $obj['sip_auth_password'] = $sip_auth_password;
        null !== $sip_auth_username && $obj['sip_auth_username'] = $sip_auth_username;

        return $obj;
    }

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The SIP URI to which the call will be referred.
     */
    public function withSipAddress(string $sipAddress): self
    {
        $obj = clone $this;
        $obj['sip_address'] = $sipAddress;

        return $obj;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj['sip_auth_password'] = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj['sip_auth_username'] = $sipAuthUsername;

        return $obj;
    }
}
