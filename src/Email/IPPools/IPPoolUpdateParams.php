<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Rename the pool, set or clear the default flag, or change its domain scope. Routing follows the new settings for subsequent mail.
 *
 * @see Telnyx\Services\Email\IPPoolsService::update()
 *
 * @phpstan-type IPPoolUpdateParamsShape = array{
 *   domainID?: string|null, isDefault?: bool|null, name?: string|null
 * }
 */
final class IPPoolUpdateParams implements BaseModel
{
    /** @use SdkModel<IPPoolUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Scope the pool to one of the account's email domains, or `null` to remove the scope.
     */
    #[Optional('domain_id', nullable: true)]
    public ?string $domainID;

    /**
     * Set or clear the account default flag. An account can have one default pool.
     */
    #[Optional('is_default')]
    public ?bool $isDefault;

    /**
     * Pool name: 1-64 characters of lowercase letters, digits, `.`, `_`, and `-`, starting and ending with a letter or digit. Must be unique within the account and must not start with `dip_`.
     */
    #[Optional]
    public ?string $name;

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
        string|Omitted|null $domainID = Omitted::VALUE,
        ?bool $isDefault = null,
        ?string $name = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $domainID && $self['domainID'] = $domainID;
        null !== $isDefault && $self['isDefault'] = $isDefault;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Scope the pool to one of the account's email domains, or `null` to remove the scope.
     */
    public function withDomainID(?string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * Set or clear the account default flag. An account can have one default pool.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

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
}
