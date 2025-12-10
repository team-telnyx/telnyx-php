<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\RecordType;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\WebhookAPIVersion;

/**
 * @phpstan-type MobileVoiceConnectionDeleteResponseShape = array{
 *   data?: MobileVoiceConnection|null
 * }
 */
final class MobileVoiceConnectionDeleteResponse implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MobileVoiceConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MobileVoiceConnection|array{
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
    public static function with(MobileVoiceConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MobileVoiceConnection|array{
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
    public function withData(MobileVoiceConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
