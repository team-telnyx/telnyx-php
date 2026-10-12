<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Set the HTTPS URL that receives number-ownership events for this enterprise: `number_reputation.number.flagged`, `number_reputation.number.removed` and `number_reputation.external_verification.status_changed`. Send `webhook_url: null` to stop receiving them.
 *
 * @see Telnyx\Services\Enterprises\ReputationService::updateWebhook()
 *
 * @phpstan-type ReputationUpdateWebhookParamsShape = array{
 *   webhookURL: string|null
 * }
 */
final class ReputationUpdateWebhookParams implements BaseModel
{
    /** @use SdkModel<ReputationUpdateWebhookParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * HTTPS URL on a publicly routable host. Send `null` to stop receiving number-ownership events.
     */
    #[Required('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new ReputationUpdateWebhookParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationUpdateWebhookParams::with(webhookURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationUpdateWebhookParams)->withWebhookURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $webhookURL): self
    {
        $self = new self;

        $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * HTTPS URL on a publicly routable host. Send `null` to stop receiving number-ownership events.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
