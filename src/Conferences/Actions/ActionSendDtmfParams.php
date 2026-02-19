<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Send DTMF tones to one or more conference participants.
 *
 * @see Telnyx\Services\Conferences\ActionsService::sendDtmf()
 *
 * @phpstan-type ActionSendDtmfParamsShape = array{
 *   digits: string,
 *   callControlIDs?: list<string>|null,
 *   clientState?: string|null,
 *   durationMillis?: int|null,
 * }
 */
final class ActionSendDtmfParams implements BaseModel
{
    /** @use SdkModel<ActionSendDtmfParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * DTMF digits to send. Valid characters: 0-9, A-D, *, #, w (0.5s pause), W (1s pause).
     */
    #[Required]
    public string $digits;

    /**
     * Array of participant call control IDs to send DTMF to. When empty, DTMF will be sent to all participants.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Optional('call_control_ids', list: 'string')]
    public ?array $callControlIDs;

    /**
     * Use this field to add state to every subsequent webhook. Must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Duration of each DTMF digit in milliseconds.
     */
    #[Optional('duration_millis')]
    public ?int $durationMillis;

    /**
     * `new ActionSendDtmfParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSendDtmfParams::with(digits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSendDtmfParams)->withDigits(...)
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
     * @param list<string>|null $callControlIDs
     */
    public static function with(
        string $digits,
        ?array $callControlIDs = null,
        ?string $clientState = null,
        ?int $durationMillis = null,
    ): self {
        $self = new self;

        $self['digits'] = $digits;

        null !== $callControlIDs && $self['callControlIDs'] = $callControlIDs;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $durationMillis && $self['durationMillis'] = $durationMillis;

        return $self;
    }

    /**
     * DTMF digits to send. Valid characters: 0-9, A-D, *, #, w (0.5s pause), W (1s pause).
     */
    public function withDigits(string $digits): self
    {
        $self = clone $this;
        $self['digits'] = $digits;

        return $self;
    }

    /**
     * Array of participant call control IDs to send DTMF to. When empty, DTMF will be sent to all participants.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $self = clone $this;
        $self['callControlIDs'] = $callControlIDs;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. Must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Duration of each DTMF digit in milliseconds.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $self = clone $this;
        $self['durationMillis'] = $durationMillis;

        return $self;
    }
}
