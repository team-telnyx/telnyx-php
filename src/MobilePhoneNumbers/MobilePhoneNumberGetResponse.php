<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\Outbound;

/**
 * @phpstan-type MobilePhoneNumberGetResponseShape = array{data?: Data|null}
 */
final class MobilePhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   callForwarding?: CallForwarding|null,
     *   callRecording?: CallRecording|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListing?: CnamListing|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   connectionType?: string|null,
     *   countryISOAlpha2?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   inbound?: Inbound|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   mobileVoiceEnabled?: bool|null,
     *   noiseSuppression?: value-of<NoiseSuppression>|null,
     *   outbound?: Outbound|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   status?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   callForwarding?: CallForwarding|null,
     *   callRecording?: CallRecording|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListing?: CnamListing|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   connectionType?: string|null,
     *   countryISOAlpha2?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   inbound?: Inbound|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   mobileVoiceEnabled?: bool|null,
     *   noiseSuppression?: value-of<NoiseSuppression>|null,
     *   outbound?: Outbound|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   status?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
