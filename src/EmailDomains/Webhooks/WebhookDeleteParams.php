<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes the webhook subscription identified by ID within the specified email domain and returns the deleted subscription.
 *
 * @see Telnyx\Services\EmailDomains\WebhooksService::delete()
 *
 * @phpstan-type WebhookDeleteParamsShape = array{domainID: string}
 */
final class WebhookDeleteParams implements BaseModel
{
    /** @use SdkModel<WebhookDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $domainID;

    /**
     * `new WebhookDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookDeleteParams::with(domainID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookDeleteParams)->withDomainID(...)
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
    public static function with(string $domainID): self
    {
        $self = new self;

        $self['domainID'] = $domainID;

        return $self;
    }

    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }
}
