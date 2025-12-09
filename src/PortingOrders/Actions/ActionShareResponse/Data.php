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
 *   permissions?: list<value-of<Permission>>|null,
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
     * @param list<Permission|value-of<Permission>> $permissions
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $token && $obj['token'] = $token;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $expiresInSeconds && $obj['expiresInSeconds'] = $expiresInSeconds;
        null !== $permissions && $obj['permissions'] = $permissions;
        null !== $portingOrderID && $obj['portingOrderID'] = $portingOrderID;
        null !== $recordType && $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Uniquely identifies this sharing token.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * A signed JWT token that can be used to access the shared resource.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj['token'] = $token;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * The number of seconds until the sharing token expires.
     */
    public function withExpiresInSeconds(int $expiresInSeconds): self
    {
        $obj = clone $this;
        $obj['expiresInSeconds'] = $expiresInSeconds;

        return $obj;
    }

    /**
     * The permissions granted to the sharing token.
     *
     * @param list<Permission|value-of<Permission>> $permissions
     */
    public function withPermissions(array $permissions): self
    {
        $obj = clone $this;
        $obj['permissions'] = $permissions;

        return $obj;
    }

    /**
     * Identifies the porting order resource being shared.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['portingOrderID'] = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
