<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions\ActionShareResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionShareResponse\Data\Permission;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   token?: string,
 *   createdAt?: \DateTimeInterface,
 *   expiresAt?: \DateTimeInterface,
 *   expiresInSeconds?: int,
 *   permissions?: list<value-of<Permission>>,
 *   portingOrderID?: string,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
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
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    #[Api('expires_at', optional: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The number of seconds until the sharing token expires.
     */
    #[Api('expires_in_seconds', optional: true)]
    public ?int $expiresInSeconds;

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
    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
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

        null !== $id && $obj->id = $id;
        null !== $token && $obj->token = $token;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $expiresInSeconds && $obj->expiresInSeconds = $expiresInSeconds;
        null !== $permissions && $obj['permissions'] = $permissions;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $recordType && $obj->recordType = $recordType;

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
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the sharing token expires.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * The number of seconds until the sharing token expires.
     */
    public function withExpiresInSeconds(int $expiresInSeconds): self
    {
        $obj = clone $this;
        $obj->expiresInSeconds = $expiresInSeconds;

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
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
