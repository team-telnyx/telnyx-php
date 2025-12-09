<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
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

    #[Optional]
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
     * } $data
     */
    public function withData(MessagingProfile|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
