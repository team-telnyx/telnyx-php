<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfile\RecordType;
use Telnyx\MessagingProfiles\MessagingProfile\WebhookAPIVersion;

/**
 * @phpstan-type MessagingProfileUpdateResponseShape = array{
 *   data?: MessagingProfile|null
 * }
 */
final class MessagingProfileUpdateResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileUpdateResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?MessagingProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingProfile|array{
     *   id?: string|null,
     *   alpha_sender?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   daily_spend_limit?: string|null,
     *   daily_spend_limit_enabled?: bool|null,
     *   enabled?: bool|null,
     *   health_webhook_url?: string|null,
     *   mms_fall_back_to_sms?: bool|null,
     *   mms_transcoding?: bool|null,
     *   mobile_only?: bool|null,
     *   name?: string|null,
     *   number_pool_settings?: NumberPoolSettings|null,
     *   record_type?: value-of<RecordType>|null,
     *   redaction_enabled?: bool|null,
     *   redaction_level?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     *   url_shortener_settings?: URLShortenerSettings|null,
     *   v1_secret?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $data
     */
    public static function with(MessagingProfile|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MessagingProfile|array{
     *   id?: string|null,
     *   alpha_sender?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   daily_spend_limit?: string|null,
     *   daily_spend_limit_enabled?: bool|null,
     *   enabled?: bool|null,
     *   health_webhook_url?: string|null,
     *   mms_fall_back_to_sms?: bool|null,
     *   mms_transcoding?: bool|null,
     *   mobile_only?: bool|null,
     *   name?: string|null,
     *   number_pool_settings?: NumberPoolSettings|null,
     *   record_type?: value-of<RecordType>|null,
     *   redaction_enabled?: bool|null,
     *   redaction_level?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     *   url_shortener_settings?: URLShortenerSettings|null,
     *   v1_secret?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $data
     */
    public function withData(MessagingProfile|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
