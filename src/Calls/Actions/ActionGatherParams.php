<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\STAINLESS_FIXME_Calls\ActionsService::gather()
 *
 * @phpstan-type ActionGatherParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   gather_id?: string,
 *   initial_timeout_millis?: int,
 *   inter_digit_timeout_millis?: int,
 *   maximum_digits?: int,
 *   minimum_digits?: int,
 *   terminating_digit?: string,
 *   timeout_millis?: int,
 *   valid_digits?: string,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     */
    #[Api(optional: true)]
    public ?string $gather_id;

    /**
     * The number of milliseconds to wait for the first DTMF.
     */
    #[Api(optional: true)]
    public ?int $initial_timeout_millis;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Api(optional: true)]
    public ?int $inter_digit_timeout_millis;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Api(optional: true)]
    public ?int $maximum_digits;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Api(optional: true)]
    public ?int $minimum_digits;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Api(optional: true)]
    public ?string $terminating_digit;

    /**
     * The number of milliseconds to wait to complete the request.
     */
    #[Api(optional: true)]
    public ?int $timeout_millis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Api(optional: true)]
    public ?string $valid_digits;

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
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $gather_id = null,
        ?int $initial_timeout_millis = null,
        ?int $inter_digit_timeout_millis = null,
        ?int $maximum_digits = null,
        ?int $minimum_digits = null,
        ?string $terminating_digit = null,
        ?int $timeout_millis = null,
        ?string $valid_digits = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $gather_id && $obj->gather_id = $gather_id;
        null !== $initial_timeout_millis && $obj->initial_timeout_millis = $initial_timeout_millis;
        null !== $inter_digit_timeout_millis && $obj->inter_digit_timeout_millis = $inter_digit_timeout_millis;
        null !== $maximum_digits && $obj->maximum_digits = $maximum_digits;
        null !== $minimum_digits && $obj->minimum_digits = $minimum_digits;
        null !== $terminating_digit && $obj->terminating_digit = $terminating_digit;
        null !== $timeout_millis && $obj->timeout_millis = $timeout_millis;
        null !== $valid_digits && $obj->valid_digits = $valid_digits;

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
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * An id that will be sent back in the corresponding `call.gather.ended` webhook. Will be randomly generated if not specified.
     */
    public function withGatherID(string $gatherID): self
    {
        $obj = clone $this;
        $obj->gather_id = $gatherID;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for the first DTMF.
     */
    public function withInitialTimeoutMillis(int $initialTimeoutMillis): self
    {
        $obj = clone $this;
        $obj->initial_timeout_millis = $initialTimeoutMillis;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $obj = clone $this;
        $obj->inter_digit_timeout_millis = $interDigitTimeoutMillis;

        return $obj;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $obj = clone $this;
        $obj->maximum_digits = $maximumDigits;

        return $obj;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $obj = clone $this;
        $obj->minimum_digits = $minimumDigits;

        return $obj;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $obj = clone $this;
        $obj->terminating_digit = $terminatingDigit;

        return $obj;
    }

    /**
     * The number of milliseconds to wait to complete the request.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $obj = clone $this;
        $obj->timeout_millis = $timeoutMillis;

        return $obj;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $obj = clone $this;
        $obj->valid_digits = $validDigits;

        return $obj;
    }
}
