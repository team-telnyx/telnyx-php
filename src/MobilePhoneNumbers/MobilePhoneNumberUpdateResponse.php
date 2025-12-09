<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber\Outbound;

/**
 * @phpstan-type MobilePhoneNumberUpdateResponseShape = array{
 *   data?: MobilePhoneNumber|null
 * }
 */
final class MobilePhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MobilePhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MobilePhoneNumber|array{
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
    public static function with(MobilePhoneNumber|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MobilePhoneNumber|array{
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
    public function withData(MobilePhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
