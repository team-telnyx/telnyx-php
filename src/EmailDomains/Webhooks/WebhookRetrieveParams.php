<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a webhook.
 *
 * @see Telnyx\Services\EmailDomains\WebhooksService::retrieve()
 *
 * @phpstan-type WebhookRetrieveParamsShape = array{domainID: string}
 */
final class WebhookRetrieveParams implements BaseModel
{
    /** @use SdkModel<WebhookRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $domainID;

    /**
     * `new WebhookRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookRetrieveParams::with(domainID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookRetrieveParams)->withDomainID(...)
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
