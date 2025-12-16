<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Gather DTMF signals to build interactive menus.
 *
 * You can pass a list of valid digits. The `Answer` command must be issued before the `gather` command.
 *
 * **Expected Webhooks:**
 *
 * - `call.dtmf.received` (you may receive many of these webhooks)
 * - `call.gather.ended`
 *
 * @see Telnyx\Services\Calls\ActionsService::gather()
 *
 * @phpstan-type ActionGatherParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   gatherID?: string|null,
 *   initialTimeoutMillis?: int|null,
 *   interDigitTimeoutMillis?: int|null,
 *   maximumDigits?: int|null,
 *   minimumDigits?: int|null,
 *   terminatingDigit?: string|null,
 *   timeoutMillis?: int|null,
 *   validDigits?: string|null,
 * }
 */
final class ActionGatherParams implements BaseModel
{
    /** @use SdkModel<ActionGatherParamsShape> */
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
     * An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     */
    #[Optional('gather_id')]
    public ?string $gatherID;

    /**
     * The number of milliseconds to wait for the first DTMF.
     */
    #[Optional('initial_timeout_millis')]
    public ?int $initialTimeoutMillis;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Optional('inter_digit_timeout_millis')]
    public ?int $interDigitTimeoutMillis;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Optional('maximum_digits')]
    public ?int $maximumDigits;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Optional('minimum_digits')]
    public ?int $minimumDigits;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Optional('terminating_digit')]
    public ?string $terminatingDigit;

    /**
     * The number of milliseconds to wait to complete the request.
     */
    #[Optional('timeout_millis')]
    public ?int $timeoutMillis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Optional('valid_digits')]
    public ?string $validDigits;

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
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $gatherID = null,
        ?int $initialTimeoutMillis = null,
        ?int $interDigitTimeoutMillis = null,
        ?int $maximumDigits = null,
        ?int $minimumDigits = null,
        ?string $terminatingDigit = null,
        ?int $timeoutMillis = null,
        ?string $validDigits = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $gatherID && $self['gatherID'] = $gatherID;
        null !== $initialTimeoutMillis && $self['initialTimeoutMillis'] = $initialTimeoutMillis;
        null !== $interDigitTimeoutMillis && $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;
        null !== $maximumDigits && $self['maximumDigits'] = $maximumDigits;
        null !== $minimumDigits && $self['minimumDigits'] = $minimumDigits;
        null !== $terminatingDigit && $self['terminatingDigit'] = $terminatingDigit;
        null !== $timeoutMillis && $self['timeoutMillis'] = $timeoutMillis;
        null !== $validDigits && $self['validDigits'] = $validDigits;

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
     * An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     */
    public function withGatherID(string $gatherID): self
    {
        $self = clone $this;
        $self['gatherID'] = $gatherID;

        return $self;
    }

    /**
     * The number of milliseconds to wait for the first DTMF.
     */
    public function withInitialTimeoutMillis(int $initialTimeoutMillis): self
    {
        $self = clone $this;
        $self['initialTimeoutMillis'] = $initialTimeoutMillis;

        return $self;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $self = clone $this;
        $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;

        return $self;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $self = clone $this;
        $self['maximumDigits'] = $maximumDigits;

        return $self;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $self = clone $this;
        $self['minimumDigits'] = $minimumDigits;

        return $self;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $self = clone $this;
        $self['terminatingDigit'] = $terminatingDigit;

        return $self;
    }

    /**
     * The number of milliseconds to wait to complete the request.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $self = clone $this;
        $self['timeoutMillis'] = $timeoutMillis;

        return $self;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $self = clone $this;
        $self['validDigits'] = $validDigits;

        return $self;
    }
}
