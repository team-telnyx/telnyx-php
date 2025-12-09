<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Available CDR report fields grouped by category.
 *
 * @phpstan-type VoiceGetFieldsResponseShape = array{
 *   billing?: list<string>|null,
 *   interactionData?: list<string>|null,
 *   numberInformation?: list<string>|null,
 *   telephonyData?: list<string>|null,
 * }
 */
final class VoiceGetFieldsResponse implements BaseModel
{
    /** @use SdkModel<VoiceGetFieldsResponseShape> */
    use SdkModel;

    /**
     * Cost and billing related information.
     *
     * @var list<string>|null $billing
     */
    #[Optional('Billing', list: 'string')]
    public ?array $billing;

    /**
     * Fields related to call interaction and basic call information.
     *
     * @var list<string>|null $interactionData
     */
    #[Optional('Interaction Data', list: 'string')]
    public ?array $interactionData;

    /**
     * Geographic and routing information for phone numbers.
     *
     * @var list<string>|null $numberInformation
     */
    #[Optional('Number Information', list: 'string')]
    public ?array $numberInformation;

    /**
     * Technical telephony and call control information.
     *
     * @var list<string>|null $telephonyData
     */
    #[Optional('Telephony Data', list: 'string')]
    public ?array $telephonyData;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $billing
     * @param list<string> $interactionData
     * @param list<string> $numberInformation
     * @param list<string> $telephonyData
     */
    public static function with(
        ?array $billing = null,
        ?array $interactionData = null,
        ?array $numberInformation = null,
        ?array $telephonyData = null,
    ): self {
        $obj = new self;

        null !== $billing && $obj['billing'] = $billing;
        null !== $interactionData && $obj['interactionData'] = $interactionData;
        null !== $numberInformation && $obj['numberInformation'] = $numberInformation;
        null !== $telephonyData && $obj['telephonyData'] = $telephonyData;

        return $obj;
    }

    /**
     * Cost and billing related information.
     *
     * @param list<string> $billing
     */
    public function withBilling(array $billing): self
    {
        $obj = clone $this;
        $obj['billing'] = $billing;

        return $obj;
    }

    /**
     * Fields related to call interaction and basic call information.
     *
     * @param list<string> $interactionData
     */
    public function withInteractionData(array $interactionData): self
    {
        $obj = clone $this;
        $obj['interactionData'] = $interactionData;

        return $obj;
    }

    /**
     * Geographic and routing information for phone numbers.
     *
     * @param list<string> $numberInformation
     */
    public function withNumberInformation(array $numberInformation): self
    {
        $obj = clone $this;
        $obj['numberInformation'] = $numberInformation;

        return $obj;
    }

    /**
     * Technical telephony and call control information.
     *
     * @param list<string> $telephonyData
     */
    public function withTelephonyData(array $telephonyData): self
    {
        $obj = clone $this;
        $obj['telephonyData'] = $telephonyData;

        return $obj;
    }
}
