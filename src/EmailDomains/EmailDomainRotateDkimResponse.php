<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data
 *
 * @phpstan-type EmailDomainRotateDkimResponseShape = array{data: Data|DataShape}
 */
final class EmailDomainRotateDkimResponse implements BaseModel
{
    /** @use SdkModel<EmailDomainRotateDkimResponseShape> */
    use SdkModel;

    /**
     * Result of rotating a domain's DKIM key. The new key is active and signing switches to it immediately; the previous key is retired to a `retiring` state (retained, not revoked) so it can be revoked after the DNS propagation grace period. Selectors are fixed, so the DKIM DNS record's TXT value is replaced in place at the shared `<selector>._domainkey.<domain>` host — `old_selector_retained` is false and the returned dns_records carry the new value the customer must publish promptly.
     */
    #[Required]
    public Data $data;

    /**
     * `new EmailDomainRotateDkimResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDomainRotateDkimResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDomainRotateDkimResponse)->withData(...)
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
     *
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Result of rotating a domain's DKIM key. The new key is active and signing switches to it immediately; the previous key is retired to a `retiring` state (retained, not revoked) so it can be revoked after the DNS propagation grace period. Selectors are fixed, so the DKIM DNS record's TXT value is replaced in place at the shared `<selector>._domainkey.<domain>` host — `old_selector_retained` is false and the returned dns_records carry the new value the customer must publish promptly.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
