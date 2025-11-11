<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionShareResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionShareResponse\Data\Permission;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   token?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   expires_at?: \DateTimeInterface|null,
 *   expires_in_seconds?: int|null,
 *   permissions?: list<value-of<Permission>>|null,
 *   porting_order_id?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this sharing token.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * A signed JWT token that can be used to access the shared resource.
     */
    #[Api(optional: true)]
    public ?string $token;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expires_at;

    /**
     * The number of seconds until the sharing token expires.
     */
    #[Api(optional: true)]
    public ?int $expires_in_seconds;

    /**
     * The permissions granted to the sharing token.
     *
     * @var list<value-of<Permission>>|null $permissions
     */
    #[Api(list: Permission::class, optional: true)]
    public ?array $permissions;

    /**
     * Identifies the porting order resource being shared.
     */
    #[Api(optional: true)]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $expires_at = null,
        ?int $expires_in_seconds = null,
        ?array $permissions = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $token && $obj->token = $token;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $expires_at && $obj->expires_at = $expires_at;
        null !== $expires_in_seconds && $obj->expires_in_seconds = $expires_in_seconds;
        null !== $permissions && $obj['permissions'] = $permissions;
        null !== $porting_order_id && $obj->porting_order_id = $porting_order_id;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    /**
     * Uniquely identifies this sharing token.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A signed JWT token that can be used to access the shared resource.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expires_at = $expiresAt;

        return $obj;
    }

    /**
     * The number of seconds until the sharing token expires.
     */
    public function withExpiresInSeconds(int $expiresInSeconds): self
    {
        $obj = clone $this;
        $obj->expires_in_seconds = $expiresInSeconds;

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
        $obj->porting_order_id = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
