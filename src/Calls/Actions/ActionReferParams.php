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
 * Initiate a SIP Refer on a Call Control call. You can initiate a SIP Refer at any point in the duration of a call.
 *
 * **Expected Webhooks:**
 *
 * - `call.refer.started`
 * - `call.refer.completed`
 * - `call.refer.failed`
 *
 * @see Telnyx\Services\Calls\ActionsService::refer()
 *
 * @phpstan-type ActionReferParamsShape = array{
 *   sip_address: string,
 *   client_state?: string,
 *   command_id?: string,
 *   custom_headers?: list<CustomSipHeader>,
 *   sip_auth_password?: string,
 *   sip_auth_username?: string,
 *   sip_headers?: list<SipHeader>,
 * }
 */
final class ActionReferParams implements BaseModel
{
    /** @use SdkModel<ActionReferParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The SIP URI to which the call will be referred to.
     */
    #[Api]
    public string $sip_address;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $custom_headers
     */
    #[Api(list: CustomSipHeader::class, optional: true)]
    public ?array $custom_headers;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Api(optional: true)]
    public ?string $sip_auth_password;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Api(optional: true)]
    public ?string $sip_auth_username;

    /**
     * SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sip_headers
     */
    #[Api(list: SipHeader::class, optional: true)]
    public ?array $sip_headers;

    /**
     * `new ActionReferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionReferParams::with(sip_address: ...)
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
     * @param list<CustomSipHeader> $custom_headers
     * @param list<SipHeader> $sip_headers
     */
    public static function with(
        string $sip_address,
        ?string $client_state = null,
        ?string $command_id = null,
        ?array $custom_headers = null,
        ?string $sip_auth_password = null,
        ?string $sip_auth_username = null,
        ?array $sip_headers = null,
    ): self {
        $obj = new self;

        $obj->sip_address = $sip_address;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $custom_headers && $obj->custom_headers = $custom_headers;
        null !== $sip_auth_password && $obj->sip_auth_password = $sip_auth_password;
        null !== $sip_auth_username && $obj->sip_auth_username = $sip_auth_username;
        null !== $sip_headers && $obj->sip_headers = $sip_headers;

        return $obj;
    }

    /**
     * The SIP URI to which the call will be referred to.
     */
    public function withSipAddress(string $sipAddress): self
    {
        $obj = clone $this;
        $obj->sip_address = $sipAddress;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

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
        $obj->custom_headers = $customHeaders;

        return $obj;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj->sip_auth_password = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj->sip_auth_username = $sipAuthUsername;

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
        $obj->sip_headers = $sipHeaders;

        return $obj;
    }
}
