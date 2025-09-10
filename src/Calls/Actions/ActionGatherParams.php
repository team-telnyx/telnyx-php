<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionGatherParams); // set properties as needed
 * $client->calls.actions->gather(...$params->toArray());
 * ```
 * Gather DTMF signals to build interactive menus.
 *
 * You can pass a list of valid digits. The `Answer` command must be issued before the `gather` command.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/gather-call#callbacks) below):**
 *
 * - `call.dtmf.received` (you may receive many of these webhooks)
 * - `call.gather.ended`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->gather(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->gather
 *
 * @phpstan-type action_gather_params = array{
 *   clientState?: string,
 *   commandID?: string,
 *   gatherID?: string,
 *   initialTimeoutMillis?: int,
 *   interDigitTimeoutMillis?: int,
 *   maximumDigits?: int,
 *   minimumDigits?: int,
 *   terminatingDigit?: string,
 *   timeoutMillis?: int,
 *   validDigits?: string,
 * }
 */
final class ActionGatherParams implements BaseModel
{
    /** @use SdkModel<action_gather_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     */
    #[Api('gather_id', optional: true)]
    public ?string $gatherID;

    /**
     * The number of milliseconds to wait for the first DTMF.
     */
    #[Api('initial_timeout_millis', optional: true)]
    public ?int $initialTimeoutMillis;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Api('inter_digit_timeout_millis', optional: true)]
    public ?int $interDigitTimeoutMillis;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Api('maximum_digits', optional: true)]
    public ?int $maximumDigits;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Api('minimum_digits', optional: true)]
    public ?int $minimumDigits;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Api('terminating_digit', optional: true)]
    public ?string $terminatingDigit;

    /**
     * The number of milliseconds to wait to complete the request.
     */
    #[Api('timeout_millis', optional: true)]
    public ?int $timeoutMillis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Api('valid_digits', optional: true)]
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
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $gatherID && $obj->gatherID = $gatherID;
        null !== $initialTimeoutMillis && $obj->initialTimeoutMillis = $initialTimeoutMillis;
        null !== $interDigitTimeoutMillis && $obj->interDigitTimeoutMillis = $interDigitTimeoutMillis;
        null !== $maximumDigits && $obj->maximumDigits = $maximumDigits;
        null !== $minimumDigits && $obj->minimumDigits = $minimumDigits;
        null !== $terminatingDigit && $obj->terminatingDigit = $terminatingDigit;
        null !== $timeoutMillis && $obj->timeoutMillis = $timeoutMillis;
        null !== $validDigits && $obj->validDigits = $validDigits;

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
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     */
    public function withGatherID(string $gatherID): self
    {
        $obj = clone $this;
        $obj->gatherID = $gatherID;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for the first DTMF.
     */
    public function withInitialTimeoutMillis(int $initialTimeoutMillis): self
    {
        $obj = clone $this;
        $obj->initialTimeoutMillis = $initialTimeoutMillis;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $obj = clone $this;
        $obj->interDigitTimeoutMillis = $interDigitTimeoutMillis;

        return $obj;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $obj = clone $this;
        $obj->maximumDigits = $maximumDigits;

        return $obj;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $obj = clone $this;
        $obj->minimumDigits = $minimumDigits;

        return $obj;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $obj = clone $this;
        $obj->terminatingDigit = $terminatingDigit;

        return $obj;
    }

    /**
     * The number of milliseconds to wait to complete the request.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $obj = clone $this;
        $obj->timeoutMillis = $timeoutMillis;

        return $obj;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $obj = clone $this;
        $obj->validDigits = $validDigits;

        return $obj;
    }
}
