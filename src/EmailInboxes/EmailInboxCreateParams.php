<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an inbox on an inbound-enabled domain. When `domain_id` is omitted, Telnyx
 * allocates the account's shared inbound subdomain so the inbox is immediately usable
 * without customer DNS setup. When `username` is omitted, a unique username is generated.
 *
 * @see Telnyx\Services\EmailInboxesService::create()
 *
 * @phpstan-type EmailInboxCreateParamsShape = array{
 *   domainID?: string|null, username?: string|null
 * }
 */
final class EmailInboxCreateParams implements BaseModel
{
    /** @use SdkModel<EmailInboxCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Account-owned, inbound-enabled domain UUID. The account's shared inbound subdomain is allocated when omitted.
     */
    #[Optional('domain_id')]
    public ?string $domainID;

    /**
     * Inbox local part. Trimmed and lowercased before validation; the normalized value must be 1-64 characters, start and end with a letter or digit, and contain only letters, digits, dots, hyphens, and underscores. Generated when omitted.
     */
    #[Optional]
    public ?string $username;

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
        ?string $domainID = null,
        ?string $username = null
    ): self {
        $self = new self;

        null !== $domainID && $self['domainID'] = $domainID;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * Account-owned, inbound-enabled domain UUID. The account's shared inbound subdomain is allocated when omitted.
     */
    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * Inbox local part. Trimmed and lowercased before validation; the normalized value must be 1-64 characters, start and end with a letter or digit, and contain only letters, digits, dots, hyphens, and underscores. Generated when omitted.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
