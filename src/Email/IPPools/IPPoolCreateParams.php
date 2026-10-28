<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create an account-scoped pool of dedicated IPs. Set `is_default` or `domain_id` for the pool to carry mail; a pool with neither carries none.
 *
 * @see Telnyx\Services\Email\IPPoolsService::create()
 *
 * @phpstan-type IPPoolCreateParamsShape = array{
 *   name: string, domainID?: string|null, isDefault?: bool|null
 * }
 */
final class IPPoolCreateParams implements BaseModel
{
    /** @use SdkModel<IPPoolCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pool name: 1-64 characters of lowercase letters, digits, `.`, `_`, and `-`, starting and ending with a letter or digit. Must be unique within the account and must not start with `dip_`.
     */
    #[Required]
    public string $name;

    /**
     * Scope the pool to one of the account's email domains; the pool then carries that domain's mail. Scope at most one pool to each domain.
     */
    #[Optional('domain_id')]
    public ?string $domainID;

    /**
     * Make this the account's default pool, which carries mail for sending domains without a domain-scoped pool. An account can have one default pool. Defaults to `false`.
     */
    #[Optional('is_default')]
    public ?bool $isDefault;

    /**
     * `new IPPoolCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPPoolCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPPoolCreateParams)->withName(...)
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
    public static function with(
        string $name,
        ?string $domainID = null,
        ?bool $isDefault = null
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $domainID && $self['domainID'] = $domainID;
        null !== $isDefault && $self['isDefault'] = $isDefault;

        return $self;
    }

    /**
     * Pool name: 1-64 characters of lowercase letters, digits, `.`, `_`, and `-`, starting and ending with a letter or digit. Must be unique within the account and must not start with `dip_`.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Scope the pool to one of the account's email domains; the pool then carries that domain's mail. Scope at most one pool to each domain.
     */
    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * Make this the account's default pool, which carries mail for sending domains without a domain-scoped pool. An account can have one default pool. Defaults to `false`.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

        return $self;
    }
}
