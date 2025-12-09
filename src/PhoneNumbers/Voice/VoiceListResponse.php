<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\UsagePaymentMethod;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<PhoneNumberWithVoiceSettings>|null, meta?: PaginationMeta|null
 * }
 */
final class VoiceListResponse implements BaseModel
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    /** @var list<PhoneNumberWithVoiceSettings>|null $data */
    #[Optional(list: PhoneNumberWithVoiceSettings::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberWithVoiceSettings|array{
     *   id?: string|null,
     *   callForwarding?: CallForwarding|null,
     *   callRecording?: CallRecording|null,
     *   cnamListing?: CnamListing|null,
     *   connectionID?: string|null,
     *   customerReference?: string|null,
     *   emergency?: Emergency|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   mediaFeatures?: MediaFeatures|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   techPrefixEnabled?: bool|null,
     *   translatedNumber?: string|null,
     *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<PhoneNumberWithVoiceSettings|array{
     *   id?: string|null,
     *   callForwarding?: CallForwarding|null,
     *   callRecording?: CallRecording|null,
     *   cnamListing?: CnamListing|null,
     *   connectionID?: string|null,
     *   customerReference?: string|null,
     *   emergency?: Emergency|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   mediaFeatures?: MediaFeatures|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   techPrefixEnabled?: bool|null,
     *   translatedNumber?: string|null,
     *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
