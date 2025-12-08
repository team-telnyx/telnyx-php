<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Available CDR report fields grouped by category.
 *
 * @phpstan-type VoiceGetFieldsResponseShape = array{
 *   Billing?: list<string>|null,
 *   Interaction_Data?: list<string>|null,
 *   Number_Information?: list<string>|null,
 *   Telephony_Data?: list<string>|null,
 * }
 */
final class VoiceGetFieldsResponse implements BaseModel
{
    /** @use SdkModel<VoiceGetFieldsResponseShape> */
    use SdkModel;

    /**
     * Cost and billing related information.
     *
     * @var list<string>|null $Billing
     */
    #[Api(list: 'string', optional: true)]
    public ?array $Billing;

    /**
     * Fields related to call interaction and basic call information.
     *
     * @var list<string>|null $Interaction_Data
     */
    #[Api('Interaction Data', list: 'string', optional: true)]
    public ?array $Interaction_Data;

    /**
     * Geographic and routing information for phone numbers.
     *
     * @var list<string>|null $Number_Information
     */
    #[Api('Number Information', list: 'string', optional: true)]
    public ?array $Number_Information;

    /**
     * Technical telephony and call control information.
     *
     * @var list<string>|null $Telephony_Data
     */
    #[Api('Telephony Data', list: 'string', optional: true)]
    public ?array $Telephony_Data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $Billing
     * @param list<string> $Interaction_Data
     * @param list<string> $Number_Information
     * @param list<string> $Telephony_Data
     */
    public static function with(
        ?array $Billing = null,
        ?array $Interaction_Data = null,
        ?array $Number_Information = null,
        ?array $Telephony_Data = null,
    ): self {
        $obj = new self;

        null !== $Billing && $obj['Billing'] = $Billing;
        null !== $Interaction_Data && $obj['Interaction_Data'] = $Interaction_Data;
        null !== $Number_Information && $obj['Number_Information'] = $Number_Information;
        null !== $Telephony_Data && $obj['Telephony_Data'] = $Telephony_Data;

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
        $obj['Billing'] = $billing;

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
        $obj['Interaction_Data'] = $interactionData;

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
        $obj['Number_Information'] = $numberInformation;

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
        $obj['Telephony_Data'] = $telephonyData;

        return $obj;
    }
}
