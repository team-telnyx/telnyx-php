<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionShareResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionShareResponse\Data\Permission;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   token?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   expiresInSeconds?: int|null,
 *   permissions?: list<Permission|value-of<Permission>>|null,
 *   portingOrderID?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this sharing token.
     */
    #[Optional]
    public ?string $id;

    /**
     * A signed JWT token that can be used to access the shared resource.
     */
    #[Optional]
    public ?string $token;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The number of seconds until the sharing token expires.
     */
    #[Optional('expires_in_seconds')]
    public ?int $expiresInSeconds;

    /**
     * The permissions granted to the sharing token.
     *
     * @var list<value-of<Permission>>|null $permissions
     */
    #[Optional(list: Permission::class)]
    public ?array $permissions;

    /**
     * Identifies the porting order resource being shared.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Permission|value-of<Permission>>|null $permissions
     */
    public static function with(
        ?string $id = null,
        ?string $token = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $expiresAt = null,
        ?int $expiresInSeconds = null,
        ?array $permissions = null,
        ?string $portingOrderID = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $token && $self['token'] = $token;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $expiresInSeconds && $self['expiresInSeconds'] = $expiresInSeconds;
        null !== $permissions && $self['permissions'] = $permissions;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Uniquely identifies this sharing token.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A signed JWT token that can be used to access the shared resource.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * The number of seconds until the sharing token expires.
     */
    public function withExpiresInSeconds(int $expiresInSeconds): self
    {
        $self = clone $this;
        $self['expiresInSeconds'] = $expiresInSeconds;

        return $self;
    }

    /**
     * The permissions granted to the sharing token.
     *
     * @param list<Permission|value-of<Permission>> $permissions
     */
    public function withPermissions(array $permissions): self
    {
        $self = clone $this;
        $self['permissions'] = $permissions;

        return $self;
    }

    /**
     * Identifies the porting order resource being shared.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
