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
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;

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
}
