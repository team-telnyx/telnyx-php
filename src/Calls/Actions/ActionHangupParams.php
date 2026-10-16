<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\CustomSipHeader;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Hang up the call.
 *
 * **Expected Webhooks:**
 *
 * - `call.hangup`
 * - `call.recording.saved`
 *
 * @see Telnyx\Services\Calls\ActionsService::hangup()
 *
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 *
 * @phpstan-type ActionHangupParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   customHeaders?: list<CustomSipHeader|CustomSipHeaderShape>|null,
 *   reason?: string|null,
 * }
 */
final class ActionHangupParams implements BaseModel
{
    /** @use SdkModel<ActionHangupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Custom headers to be added to the SIP BYE message.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

    /**
     * Text for the SIP `Reason` header (RFC 3326) sent when cancelling an unanswered outbound leg. The SIP CANCEL carries `Reason: SIP;cause=200;text="<reason>"`; phones such as Poly and Yealink use it to suppress the missed-call entry for a call answered elsewhere. Has no effect on an answered leg or an inbound leg. A hangup sent before the leg's `call.initiated` webhook still hangs up the leg, but without the `Reason` header. Must not contain `"`, `\`, control characters, or characters outside the Basic Multilingual Plane (such as emoji); invalid values are rejected with a 422.
     */
    #[Optional]
    public ?string $reason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CustomSipHeader|CustomSipHeaderShape>|null $customHeaders
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        ?string $reason = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $reason && $self['reason'] = $reason;

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
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP BYE message.
     *
     * @param list<CustomSipHeader|CustomSipHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * Text for the SIP `Reason` header (RFC 3326) sent when cancelling an unanswered outbound leg. The SIP CANCEL carries `Reason: SIP;cause=200;text="<reason>"`; phones such as Poly and Yealink use it to suppress the missed-call entry for a call answered elsewhere. Has no effect on an answered leg or an inbound leg. A hangup sent before the leg's `call.initiated` webhook still hangs up the leg, but without the `Reason` header. Must not contain `"`, `\`, control characters, or characters outside the Basic Multilingual Plane (such as emoji); invalid values are rejected with a 422.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
