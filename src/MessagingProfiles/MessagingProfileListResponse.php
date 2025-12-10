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
     *   alphaSender?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   dailySpendLimit?: string|null,
     *   dailySpendLimitEnabled?: bool|null,
     *   enabled?: bool|null,
     *   healthWebhookURL?: string|null,
     *   mmsFallBackToSMS?: bool|null,
     *   mmsTranscoding?: bool|null,
     *   mobileOnly?: bool|null,
     *   name?: string|null,
     *   numberPoolSettings?: NumberPoolSettings|null,
     *   recordType?: value-of<RecordType>|null,
     *   redactionEnabled?: bool|null,
     *   redactionLevel?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   urlShortenerSettings?: URLShortenerSettings|null,
     *   v1Secret?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MessagingProfile|array{
     *   id?: string|null,
     *   alphaSender?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   dailySpendLimit?: string|null,
     *   dailySpendLimitEnabled?: bool|null,
     *   enabled?: bool|null,
     *   healthWebhookURL?: string|null,
     *   mmsFallBackToSMS?: bool|null,
     *   mmsTranscoding?: bool|null,
     *   mobileOnly?: bool|null,
     *   name?: string|null,
     *   numberPoolSettings?: NumberPoolSettings|null,
     *   recordType?: value-of<RecordType>|null,
     *   redactionEnabled?: bool|null,
     *   redactionLevel?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   urlShortenerSettings?: URLShortenerSettings|null,
     *   v1Secret?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
