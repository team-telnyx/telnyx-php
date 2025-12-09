<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\Outbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Meta;

/**
 * @phpstan-type MobilePhoneNumberListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class MobilePhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
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
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
