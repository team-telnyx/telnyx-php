<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\UserData;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update Whatsapp user data.
 *
 * @see Telnyx\Services\Whatsapp\UserDataService::update()
 *
 * @phpstan-type UserDataUpdateParamsShape = array{
 *   webhookFailoverURL?: string|null, webhookURL?: string|null
 * }
 */
final class UserDataUpdateParams implements BaseModel
{
    /** @use SdkModel<UserDataUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Failover URL to send Whatsapp signup events.
     */
    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    /**
     * URL to send Whatsapp signup events.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null
    ): self {
        $self = new self;

        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Failover URL to send Whatsapp signup events.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * URL to send Whatsapp signup events.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
