<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\MessagingProfiles\MessagingProfile\RecordType;
use Telnyx\MessagingProfiles\MessagingProfile\WebhookAPIVersion;

/**
 * @phpstan-type MessagingProfileListResponseShape = array{
 *   data?: list<MessagingProfile>|null, meta?: PaginationMeta|null
 * }
 */
final class MessagingProfileListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingProfileListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MessagingProfile>|null $data */
    #[Api(list: MessagingProfile::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
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
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
