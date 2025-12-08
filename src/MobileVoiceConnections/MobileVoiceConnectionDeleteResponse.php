<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse\Data;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse\Data\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse\Data\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse\Data\RecordType;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse\Data\WebhookAPIVersion;

/**
 * @phpstan-type MobileVoiceConnectionDeleteResponseShape = array{data?: Data|null}
 */
final class MobileVoiceConnectionDeleteResponse implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   connection_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   connection_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
