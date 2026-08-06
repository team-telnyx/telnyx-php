<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes an email domain configuration. Verified domains require `force=true`, and shared domains are read-only for non-owner accounts.
 *
 * @see Telnyx\Services\EmailDomainsService::delete()
 *
 * @phpstan-type EmailDomainDeleteParamsShape = array{force?: bool|null}
 */
final class EmailDomainDeleteParams implements BaseModel
{
    /** @use SdkModel<EmailDomainDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Required as true when deleting verified domains.
     */
    #[Optional]
    public ?bool $force;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $force = null): self
    {
        $self = new self;

        null !== $force && $self['force'] = $force;

        return $self;
    }

    /**
     * Required as true when deleting verified domains.
     */
    public function withForce(bool $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }
}
