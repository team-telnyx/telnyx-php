<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfile\RecordType;
use Telnyx\MessagingProfiles\MessagingProfile\WebhookAPIVersion;
use Telnyx\MessagingProfiles\MessagingProfileListResponse\Meta;

/**
 * @phpstan-type MessagingProfileListResponseShape = array{
 *   data?: list<MessagingProfile>|null, meta?: Meta|null
 * }
 */
final class MessagingProfileListResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileListResponseShape> */
    use SdkModel;

    /** @var list<MessagingProfile>|null $data */
    #[Optional(list: MessagingProfile::class)]
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
     * @param list<MessagingProfile|array{
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
     * }> $data
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
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
     * @param list<MessagingProfile|array{
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
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
