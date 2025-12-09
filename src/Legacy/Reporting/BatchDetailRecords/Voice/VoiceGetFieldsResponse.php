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
        $self = new self;

        null !== $billing && $self['billing'] = $billing;
        null !== $interactionData && $self['interactionData'] = $interactionData;
        null !== $numberInformation && $self['numberInformation'] = $numberInformation;
        null !== $telephonyData && $self['telephonyData'] = $telephonyData;

        return $self;
    }

    /**
     * Cost and billing related information.
     *
     * @param list<string> $billing
     */
    public function withBilling(array $billing): self
    {
        $self = clone $this;
        $self['billing'] = $billing;

        return $self;
    }

    /**
     * Fields related to call interaction and basic call information.
     *
     * @param list<string> $interactionData
     */
    public function withInteractionData(array $interactionData): self
    {
        $self = clone $this;
        $self['interactionData'] = $interactionData;

        return $self;
    }

    /**
     * Geographic and routing information for phone numbers.
     *
     * @param list<string> $numberInformation
     */
    public function withNumberInformation(array $numberInformation): self
    {
        $self = clone $this;
        $self['numberInformation'] = $numberInformation;

        return $self;
    }

    /**
     * Technical telephony and call control information.
     *
     * @param list<string> $telephonyData
     */
    public function withTelephonyData(array $telephonyData): self
    {
        $self = clone $this;
        $self['telephonyData'] = $telephonyData;

        return $self;
    }
}
