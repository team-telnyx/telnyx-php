<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionReferParams); // set properties as needed
 * $client->calls.actions->refer(...$params->toArray());
 * ```
 * Initiate a SIP Refer on a Call Control call. You can initiate a SIP Refer at any point in the duration of a call.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/refer-call#callbacks) below):**
 *
 * - `call.refer.started`
 * - `call.refer.completed`
 * - `call.refer.failed`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->refer(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->refer
 *
 * @phpstan-type action_refer_params = array{
 *   sipAddress: string,
 *   clientState?: string,
 *   commandID?: string,
 *   customHeaders?: list<CustomSipHeader>,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 *   sipHeaders?: list<SipHeader>,
 * }
 */
final class ActionReferParams implements BaseModel
{
    /** @use SdkModel<action_refer_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The SIP URI to which the call will be referred to.
     */
    #[Api('sip_address')]
    public string $sipAddress;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomSipHeader::class, optional: true)]
    public ?array $customHeaders;

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
     * SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Api('sip_headers', list: SipHeader::class, optional: true)]
    public ?array $sipHeaders;

    /**
     * `new ActionReferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionReferParams::with(sipAddress: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionReferParams)->withSipAddress(...)
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
     * @param list<CustomSipHeader> $customHeaders
     * @param list<SipHeader> $sipHeaders
     */
    public static function with(
        string $sipAddress,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
    ): self {
        $obj = new self;

        $obj->sipAddress = $sipAddress;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $sipAuthPassword && $obj->sipAuthPassword = $sipAuthPassword;
        null !== $sipAuthUsername && $obj->sipAuthUsername = $sipAuthUsername;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;

        return $obj;
    }

    /**
     * The SIP URI to which the call will be referred to.
     */
    public function withSipAddress(string $sipAddress): self
    {
        $obj = clone $this;
        $obj->sipAddress = $sipAddress;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

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

    /**
     * SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj->sipHeaders = $sipHeaders;

        return $obj;
    }
}
