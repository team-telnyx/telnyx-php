<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 * @phpstan-import-type SipHeaderShape from \Telnyx\Calls\SipHeader
 *
 * @phpstan-type ActionReferParamsShape = array{
 *   sipAddress: string,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   customHeaders?: list<CustomSipHeaderShape>|null,
 *   sipAuthPassword?: string|null,
 *   sipAuthUsername?: string|null,
 *   sipHeaders?: list<SipHeaderShape>|null,
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
    #[Required('sip_address')]
    public string $sipAddress;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

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
     * SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Optional('sip_headers', list: SipHeader::class)]
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
     * @param list<CustomSipHeaderShape>|null $customHeaders
     * @param list<SipHeaderShape>|null $sipHeaders
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
        $self = new self;

        $self['sipAddress'] = $sipAddress;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;
        null !== $sipHeaders && $self['sipHeaders'] = $sipHeaders;

        return $self;
    }

    /**
     * The SIP URI to which the call will be referred to.
     */
    public function withSipAddress(string $sipAddress): self
    {
        $self = clone $this;
        $self['sipAddress'] = $sipAddress;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

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

    /**
     * SIP headers to be added to the request. Currently only User-to-User header is supported.
     *
     * @param list<SipHeaderShape> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $self = clone $this;
        $self['sipHeaders'] = $sipHeaders;

        return $self;
    }
}
