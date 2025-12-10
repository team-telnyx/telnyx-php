<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse\Data;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse\Data\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse\Data\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse\Data\RecordType;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse\Data\WebhookAPIVersion;

/**
 * @phpstan-type MobileVoiceConnectionGetResponseShape = array{data?: Data|null}
 */
final class MobileVoiceConnectionGetResponse implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionGetResponseShape> */
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
     *   active?: bool|null,
     *   connectionName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
     *   active?: bool|null,
     *   connectionName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
